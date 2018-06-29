//construct
function Module() {
	Persistence.apply(this); //super

	if(this.primaryKeys == undefined) throw 'must have the property primaryKeys';
	if(this.components == undefined) throw 'must have the property components';
	if(this.icon == undefined) throw 'must have the property icon';
	
	this.primaryKeys['id'] = new TextInput(this.createFormId('id'));
	Module.register(this.moduleName, this);
	var self = this;
	$('#form-submit-'+self.moduleName).click(function(){ self.validateFormView(); });
}
//heritage
Module.prototype = Object.create(Persistence.prototype);
$Module = Module.prototype;
//properties
$Module.modeForm = 'insert';
//methods
$Module.loadTableView = function(){
	var self = this;
	self.listPermissions(function(permission){
		if(!permission.c) $('#btn-add-'+self.moduleName).remove();
		else $('#btn-add-'+self.moduleName).unbind().click(function(){

			self.clearFormView();
			Module.showView('view-form-'+self.moduleName);
		});
		if(!permission.u) $('#label-refresh-'+self.moduleName).remove();
		if(!permission.d) $('#label-remove-'+self.moduleName).remove();
		self.loadDataTable();
	});
}
$Module.loadDataTable = function(){
	var self = this;
	self.listAll(function(res){
		self.listPermissions(function(permission){
			var tableview = $('#table-'+self.moduleName+' tbody');
			tableview.empty();
			res.map(function(item){
				var tmpRow = $('#row-'+self.moduleName)[0].content.cloneNode(true);
				//console.log(Object.keys(self.primaryKeys));
				//$(tmpRow).find('.colunm-'+self.primaryKey+'-'+self.moduleName)[0].innerHTML = item[self.primaryKey];
				Object.keys(self.primaryKeys).map(function(column){
					$(tmpRow).find('.colunm-'+column+'-'+self.moduleName)[0].innerHTML = item[column];	
				});

				Object.keys(self.components).map(function(column){
					$(tmpRow).find('.colunm-'+column+'-'+self.moduleName)[0].innerHTML = item[column];	
				});
				var serialPrimary = Object.keys(self.primaryKeys).map(function(pk){return item[pk]}).join(',');
				if(!permission.u) $(tmpRow).find('.colunm-refresh-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-refresh-'+self.moduleName).attr('data-id', serialPrimary);
				if(!permission.d) $(tmpRow).find('.colunm-remove-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-remove-'+self.moduleName).attr('data-id', serialPrimary);
				tableview.append(tmpRow);
			});
			$('.colunm-refresh-'+self.moduleName).click(function(){
				self.loadFormView(this.getAttribute('data-id'));
				Module.showView('view-form-'+self.moduleName);
			});
			$('.colunm-remove-'+self.moduleName).click(function(){
				self.confirmRemoveItem(this.getAttribute('data-id'));
			});

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
	if(self.primaryKeys.id != undefined) $('#form-id-'+this.moduleName).parent().hide();
	else {
		Object.keys(self.primaryKeys).map(function(primaryKey){
			$('#form-'+primaryKey+'-'+self.moduleName)[0].disabled = false;
		});
	}
	$('#form-submit-'+this.moduleName).html('Adicionar');
	$('#form-title-'+this.moduleName)[0].innerHTML = 'New '+Useful.convertToCamelCase(this.moduleName, ' ');
	this.modeForm = 'insert';
}
$Module.loadFormView = function(serialPrimary){
	var self = this;
	var arrPks = serialPrimary.split(',');
	var ids = {};
	for(primaryKey in self.primaryKeys){
		ids[primaryKey] = arrPks.shift();
	}

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
	});
	if(self.primaryKeys.id != undefined) $('#form-id-'+this.moduleName).parent().show();
	else {
		Object.keys(self.primaryKeys).map(function(primaryKey){
			$('#form-'+primaryKey+'-'+self.moduleName)[0].disabled = true;
		});
	}
	$('#form-submit-'+this.moduleName).html('Atualizar');
	$('#form-title-'+this.moduleName)[0].innerHTML = self.moduleName;
	this.modeForm = 'update';
}
$Module.confirmRemoveItem = function(id){
	var self = this;
	if(confirm('Tem certeza?'))
		self.removeItem(id, function(res){
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
		console.log(data);
		this.updateItem(data, function(res){
			if(res){
				self.loadDataTable();
				Module.showView('view-table-'+self.moduleName);
			} else alert('Cant update this item!');
		});
	} else {
		if(self.primaryKeys.id == undefined) {
			Object.keys(self.primaryKeys).map(function(primaryKey){
				data[primaryKey] = $('#form-'+primaryKey+'-'+self.moduleName).val();
			});
		}
		this.insertItem(data, function(res){
			if(res){
				self.loadDataTable();
				Module.showView('view-table-'+self.moduleName);
			} else alert('Cant insert this item!');
		});
	}
}
$Module.createFormId = function(columnName){
	return '#form-'+columnName+'-'+this.moduleName;
}
$Module.showTableView = function(){
	this.loadTableView();
	Module.showView('view-table-'+this.moduleName);
}
//Static properties
Module.views = [];
Module.modules = [];
//Static methods
Module.register = function(moduleName, module) {
	Module.modules[moduleName] = module;
	Module.views.push('#view-form-'+moduleName);
	Module.views.push('#view-table-'+moduleName);
}
Module.showView = function(id) {
	$(Module.views.join(',')).addClass('hide');
    $('#'+id).removeClass('hide');
}
