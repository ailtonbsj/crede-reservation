//construct
function Module() {
	var self = this;
	Persistence.apply(this); //super
	if(this.columns == undefined) throw 'must have the property columns';
	if(this.icon == undefined) throw 'must have the property icon';
	Module.register(self.moduleName, self.icon);
	$('#form-submit-'+self.moduleName).click(function(){ self.validateFormView(); });
	self.loadTableView();
}
//heritage
Module.prototype = Object.create(Persistence.prototype);
$Module = Module.prototype;
//properties
$Module.modeForm = 'insert';
$Module.primaryKey = 'id';
//methods
$Module.loadTableView = function(){
	var self = this;
	self.listPermissions(function(permission){
		if(!permission.c) $('#btn-add-'+self.moduleName).remove();
		else $('#btn-add-'+self.moduleName).click(function(){
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
				
				$(tmpRow).find('.colunm-'+self.primaryKey+'-'+self.moduleName)[0].innerHTML = item[self.primaryKey];
				
				self.columns.map(function(column){
					$(tmpRow).find('.colunm-'+column+'-'+self.moduleName)[0].innerHTML = item[column];	
				});
				
				if(!permission.u) $(tmpRow).find('.colunm-refresh-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-refresh-'+self.moduleName).attr('data-id', item[self.primaryKey]);
				if(!permission.d) $(tmpRow).find('.colunm-remove-'+self.moduleName).remove();
				else $(tmpRow).find('.colunm-remove-'+self.moduleName).attr('data-id', item[self.primaryKey]);
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
	$('#form-'+this.primaryKey+'-'+this.moduleName).val('');
	this.columns.map(function(column){
		$('#form-'+column+'-'+self.moduleName).val('');
	});
	if(self.primaryKey == 'id') $('#form-id-'+this.moduleName).parent().hide();
	else $('#form-'+self.primaryKey+'-'+this.moduleName)[0].disabled = false;
	$('#form-submit-'+this.moduleName).html('Adicionar');
	$('#form-title-'+this.moduleName)[0].innerHTML = 'New '+this.moduleName;
	this.modeForm = 'insert';
}

$Module.loadFormView = function(id){
	var self = this;
	this.listItem(id, function(res){
		$('#form-'+self.primaryKey+'-'+self.moduleName).val(res[self.primaryKey]);
		self.columns.map(function(column){
			$('#form-'+column+'-'+self.moduleName).val(res[column]);
		});
	});
	if(self.primaryKey == 'id') $('#form-id-'+this.moduleName).parent().show();
	else $('#form-'+self.primaryKey+'-'+this.moduleName)[0].disabled = true;
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
	var columns = this.columns;
	var data = {};
	for(i in columns){
		var domid = '#form-'+columns[i]+'-'+self.moduleName;
		var value = $(domid).val();
		if(value == ''){
			alert('Field is empty!');
			return false;
		}
		data[columns[i]] = value;
	}

	if(this.modeForm == 'update'){
		data[self.primaryKey] = $('#form-'+self.primaryKey+'-'+this.moduleName).val();
		this.updateItem(data, function(res){
			if(res){
				self.loadDataTable();
				Module.showView('view-table-'+self.moduleName);
			} else alert('Cant update this item!');
		});
	} else {
		if(self.primaryKey != 'id')
			data[self.primaryKey] = $('#form-'+self.primaryKey+'-'+this.moduleName).val();
		this.insertItem(data, function(res){
			if(res){
				self.loadDataTable();
				Module.showView('view-table-'+self.moduleName);
			} else alert('Cant insert this item!');
		});
	}
}
//Static properties
Module.views = [];
Module.modules = [];
//Static methods
Module.register = function(moduleName, icon) {
	Module.modules.push({module: moduleName, icon: icon});
	Module.views.push('#view-form-'+moduleName);
	Module.views.push('#view-table-'+moduleName);
}

Module.showView = function(id) {
	$(Module.views.join(',')).addClass('hide');
    $('#'+id).removeClass('hide');
}