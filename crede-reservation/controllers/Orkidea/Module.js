//construct
function Module() {
	Persistence.apply(this); //super

	if(this.primaryKeys == undefined) throw 'must have the property primaryKeys';
	if(this.components == undefined) throw 'must have the property components';
	if(this.icon == undefined) throw 'must have the property icon';
	
	this.primaryKeys['id'] = new TextInput(this.createFormId('id'));
	if(this.superModule) Module.register(this.superModule, this.moduleName, this);
	else Module.register(Module, this.moduleName, this);
	var self = this;
	$('#form-submit-'+self.moduleName).click(function(){ self.validateFormView(); });
	var div = '<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>';
	$('#view-table-'+self.moduleName).append(div);
	$('#view-form-'+self.moduleName).append(div);
	$('#btn-add-'+self.moduleName)[0].childNodes[2].nodeValue = ' '+S.InsertItemBtn;
	$('#view-table-'+self.moduleName+' .box-title').html(S[self.moduleName]);
	$('#view-detail-'+self.moduleName+' > div > .box-title').text(' [ '+S.Details+' ] '+S[self.moduleName]);
}
//heritage
Module.prototype = Object.create(Persistence.prototype);
$Module = Module.prototype;
//properties
$Module.modeForm = 'insert';
$Module.transformColumn = [];
//methods
$Module.transformField = function(columnName,value){
	if(this.transformColumn.hasOwnProperty(columnName)){
		switch(this.transformColumn[columnName]){
			case 'as-checkbox':
				value = value
				? '<center><i class="glyphicon glyphicon-ok text-success"></i></center>'
				: '<center><i class="glyphicon glyphicon-remove text-danger"></i></center>';
				break;
			case 'as-brazildatetime':
				value = moment(value,'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss');
				break;
			case 'as-brazildate':
				value = moment(value,'YYYY-MM-DD').format('DD/MM/YYYY');
				break;
			case 'as-realmoney':
				value = '<div align="right">R$ ' + parseFloat(value).toFixed(2) + '</div>';
		}
	}
	return value;
}
$Module.loadTableView = function(){
	var self = this;
	self.listPermissions(function(permission){
		if(!permission.c) $('#btn-add-'+self.moduleName).remove();
		else $('#btn-add-'+self.moduleName).unbind().click(function(){

			self.clearFormView();
			if(self.superModule) Module.showView(self.superModule, 'view-form-'+self.moduleName);
			else Module.showView(Module, 'view-form-'+self.moduleName);
		});
		if(!permission.u) $('#label-refresh-'+self.moduleName).remove();
		if(!permission.d) $('#label-remove-'+self.moduleName).remove();
		if(!permission.r) $('#label-detail-'+self.moduleName).remove();
		self.loadDataTable();
	});
}
$Module.loadDataTable = function(){
	var self = this;
	$('#view-table-'+self.moduleName+' .overlay').removeClass('hide');
	self.listAll(function(res){
		self.listPermissions(function(permission){
			var tableview = $('#table-'+self.moduleName+' tbody');
			tableview.empty();
			res.map(function(item){
				if($('#row-'+self.moduleName)[0] == undefined)
					console.log('NOT FOUND IN DOM: '+'#row-'+self.moduleName);
				var tmpRow = $('#row-'+self.moduleName)[0].content.cloneNode(true);
				Object.keys(item).map(function(column){
					var columnDom = $(tmpRow).find('.colunm-'+column+'-'+self.moduleName)[0];
					if(columnDom == undefined)
						console.log("Not found in DOM: \n"+'.colunm-'+column+'-'+self.moduleName);
					else columnDom.innerHTML = self.transformField(column, item[column]);
				});

				var serialPrimary = Object.keys(self.primaryKeys).map(function(pk){
					return pk+'='+item[pk]
				}).join(',');
				if(!permission.u) $(tmpRow).find('.colunm-refresh-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-refresh-'+self.moduleName).attr('data-id', serialPrimary);
				if(!permission.d) $(tmpRow).find('.colunm-remove-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-remove-'+self.moduleName).attr('data-id', serialPrimary);
				if(!permission.r) $(tmpRow).find('.colunm-detail-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-detail-'+self.moduleName).attr('data-id', serialPrimary);
				tableview.append(tmpRow);
			});

			$('.colunm-refresh-'+self.moduleName).click(function(){
				self.loadFormView(this.getAttribute('data-id'));
				if(self.superModule) Module.showView(self.superModule, 'view-form-'+self.moduleName);
				else Module.showView(Module, 'view-form-'+self.moduleName);
			});

			$('.colunm-remove-'+self.moduleName).click(function(){
				self.confirmRemoveItem(this.getAttribute('data-id'));
			});

			$('.colunm-detail-'+self.moduleName).click(function(){
				self.loadDetailView(this.getAttribute('data-id'));

				var pKs = self.serialToObject(this.getAttribute('data-id'));
				for(mod in self.modules){
					for(key in pKs){
						var filter = self.modules[mod].filteredBy[key];
						filter[Object.keys(filter)[0]] = pKs[key];
						console.log(self.modules[mod].filteredBy[key]);
				 		self.modules[mod].showTableView();
					}
				}

				if(self.superModule) Module.showView(self.superModule,'view-detail-'+self.moduleName);
				else Module.showView(Module,'view-detail-'+self.moduleName);
			});
		$('#view-table-'+self.moduleName+' .overlay').addClass('hide');
		});
	});	
}
$Module.clearFormView = function(){
	var self = this;
	for(column in self.primaryKeys){
		self.primaryKeys[column].clear();
	}
	for(column in self.components){
		self.components[column].clear();
	}
	for(column in self.filteredBy){
		var filtered = self.filteredBy[column];
		var val = filtered[Object.keys(filtered)[0]];
		var fields = {};
		Object.assign(fields, self.components, self.primaryKeys);
		fields[Object.keys(filtered)[0]].setValue(val);
	// 	console.log(self.primaryKeys);
	// 	//console.log(self.primaryKeys[column]);
	// 	//self.components[column].setValue(self.filteredBy[column]);
	}
	if(self.primaryKeys.id != undefined) $('#form-id-'+this.moduleName).parent().hide();
	else {
		Object.keys(self.primaryKeys).map(function(primaryKey){
			console.log('#form-'+primaryKey+'-'+self.moduleName);
			$('#form-'+primaryKey+'-'+self.moduleName)[0].disabled = false;
		});
	}
	$('#form-submit-'+this.moduleName).html(S.Insert);
	$('#form-title-'+this.moduleName)[0].innerHTML = '[ '+ S.Insert +' ] '+S[this.moduleName];
	this.modeForm = 'insert';

	// var pKs = self.serialToObject(this.getAttribute('data-id'));
	// for(mod in self.modules){
	// 	for(key in pKs){
	// 		self.modules[mod].filteredBy[key] = pKs[key];
	// 		console.log(self.modules[mod].filteredBy);
	// 		self.modules[mod].showTableView();
	// 	}
	// }
	$('#view-form-'+self.moduleName+' .overlay').addClass('hide');
}
$Module.serialToObject = function(serialPrimary){
	var arrPks = serialPrimary.split(',');
	var knvObj = {};
	for(i in arrPks){
		knv = arrPks[i].split('=');
		knvObj[knv[0]] = knv[1];
	}
	return knvObj;
}
$Module.loadFormView = function(serialPrimary){
	var self = this;
	$('#view-form-'+self.moduleName+' .overlay').removeClass('hide');
	var ids = self.serialToObject(serialPrimary);
	var fieldNames = {};
	Object.assign(fieldNames, self.primaryKeys, self.components);
	self.listItem(ids, function(res){
		// for(name in fieldNames){  //Switch has scope, but For doesn't ? O.o
		// 	(function(){
		// 		var accio = name;
		// 		fieldNames[accio].clear(function(){
		// 			console.log(accio);
		// 			fieldNames[accio].setValue(res[accio]);
		// 		});
		// 	})();
		// }
		Object.keys(fieldNames).map(function(field){ // USE map to create scope with function
			fieldNames[field].clear(function(){
				fieldNames[field].setValue(res[field]);
			});
		});
		$('#view-form-'+self.moduleName+' .overlay').addClass('hide');
	});
	if(self.primaryKeys.id != undefined) $('#form-id-'+this.moduleName).parent().show();
	else {
		Object.keys(self.primaryKeys).map(function(primaryKey){
			$('#form-'+primaryKey+'-'+self.moduleName)[0].disabled = true;
		});
	}
	$('#form-submit-'+this.moduleName).html(S.Update);
	$('#form-title-'+this.moduleName)[0].innerHTML = '[ '+S.Update+' ] ' + S[self.moduleName];
	this.modeForm = 'update';
}
$Module.loadDetailView = function(serialPrimary){
	var self = this;
	var ids = self.serialToObject(serialPrimary);
	var fieldNames = {};
	Object.assign(fieldNames, self.primaryKeys, self.components);
	self.listItem(ids, function(res){
		Object.keys(fieldNames).map(function(field){ // USE map to create scope with function
			var value = self.transformField(field, res[field]);
			$('#detail-'+field+'-'+self.moduleName).html(value);
		});
		if(self.primaryKeys.id != undefined) $('#form-id-'+self.moduleName).parent().show();
	});
}
$Module.confirmRemoveItem = function(serialPrimary){
	var self = this;
	var ids = self.serialToObject(serialPrimary);
	if(confirm(S.ConfirmDel))
		self.removeItem(ids, function(res){
			res ? self.loadDataTable() : alert('Cant remove this item!');
		});
}
$Module.validateFormView = function(){
	var self = this;
	var data = {};
	for(i in this.components){
		if(!this.components[i].isValid()){
			alert(this.components[i].log);
			return false;
		}
		data[i] = this.components[i].getValue();
	}

	if(this.modeForm == 'update'){
		Object.keys(self.primaryKeys).map(function(primaryKey){
			data[primaryKey] = $('#form-'+primaryKey+'-'+self.moduleName).val();
		});
		//Object.keys(self.primaryKeys).map
		this.updateItem(data, function(res){
			if(res){
				self.loadDataTable();
				if(self.superModule) Module.showView(self.superModule,'view-table-'+self.moduleName);
				else Module.showView(Module,'view-table-'+self.moduleName);
			} else alert('Cant update this item!');
		});
	} else {
		if(self.primaryKeys.id == undefined) {
			Object.keys(self.primaryKeys).map(function(primaryKey){
				data[primaryKey] = $('#form-'+primaryKey+'-'+self.moduleName).val();
			});
		}
		this.insertItem(data, function(res){
			self.loadDataTable();
			if(self.superModule) Module.showView(self.superModule,'view-table-'+self.moduleName);
			else Module.showView(Module,'view-table-'+self.moduleName);
		});
	}
}
$Module.createFormId = function(columnName){
	return '#form-'+columnName+'-'+this.moduleName;
}
$Module.showTableView = function(){
	this.loadTableView();
	if(this.superModule) Module.showView(this.superModule,'view-table-'+this.moduleName);
	else Module.showView(Module,'view-table-'+this.moduleName);
}
//Static properties
Module.views = [];
Module.modules = [];
//Static methods
Module.register = function(superModule, moduleName, module) {
	superModule.modules[moduleName] = module;
	superModule.views.push('#view-form-'+moduleName);
	superModule.views.push('#view-table-'+moduleName);
	superModule.views.push('#view-detail-'+moduleName);
}
Module.showView = function(superModule, id) {
	$(superModule.views.join(',')).addClass('hide');
    $('#'+id).removeClass('hide');
}
