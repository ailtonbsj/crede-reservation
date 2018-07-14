//construct
function Users(){
	Module.apply(this); //super
	this.primaryKeys = [];
	this.primaryKeys['name'] = new TextInput(this.createFormId('name'));
	this.components['pass'] = new TextInput(this.createFormId('pass'));
	this.components['fullname'] = new TextInput(this.createFormId('fullname'));

	this.components['gid'] = new TextInput(this.createFormId('gid'));
	var self = this;
	this.listPermissions(function(){
		if(self.permissions.c || self.permissions.u){
			$.get('api/groups',{gid: gidH}, function(res){
				var data = JSON.parse(res);
				self.addSelects(
					'#users-form-groups-panel', self.selectGroup,0, data);
			});
		}
	});
}
//heritage
Users.prototype = Object.create(Module.prototype);
$Users = Users.prototype;
//methods
$Users.addSelects = function(parentPanel, modelPanel, idLevel, data){
	var self = this;
	$(parentPanel).empty();
	if(data != undefined && data.length != 0){
		var keys = Object.keys(data);
		var tmpSel = $('#users-form-groups-temp')[0].content.cloneNode(true);
		$(tmpSel).find('label').html('Group Level '+idLevel);
		$(tmpSel).find('select').attr('id','users-form-select'+idLevel);
		$(tmpSel).find('.children').attr('id','users-form-panel'+idLevel);
		$(parentPanel).append(tmpSel);
		modelPanel.obj = new SelectInput('#users-form-select'+idLevel);
		modelPanel.obj.addItem('Select a group level '+idLevel,'');
		keys.map(function(key){
			modelPanel.obj.addItem(key,key);
		});
		modelPanel.obj.select.change(function(){
			selKey = modelPanel.obj.getValue();

			self.gidSelected[idLevel] = selKey;
			for(i in self.gidSelected){
				if(idLevel < i) delete self.gidSelected[i];
			}
			gidArr = [];
			for(i in self.gidSelected) gidArr[i] = self.gidSelected[i];
			var fragGid = gidArr.join('/');
			var gidHuman = '';
			if(fragGid == '') gidHuman = gidH;
			else gidHuman = gidH+'/'+gidArr.join('/');
			self.components['gid'].setValue(gidHuman);

			dataInner = data[selKey];
			modelPanel.children = {};
			self.addSelects(
				'#users-form-panel'+idLevel,
				modelPanel.children, idLevel+1, dataInner);
		});
	}
}
$Users.clearFormView = function(){
	// this.selectGroup.children = {};
	// $('#users-form-panel0').empty();
	Module.prototype.clearFormView.apply(this);
	this.components['gid'].setValue(gidH);
	if(this.selectGroup.obj) this.selectGroup.obj.setValue('');
}
$Users.loadFormView = function(serialPrimary){
	var self = this;
	Module.prototype.loadFormView.call(this,serialPrimary,function(){
		var nowGid = self.components['gid'].getValue();
		nowGid = nowGid.replace(gidH,'');
		if(nowGid[0] == '/') nowGid = nowGid.substring(1);
		var tks = nowGid.split('/');
		var sels = self.selectGroup;
		tks.map(function(tk){
			sels.obj.setValue(tk);
			sels = sels.children;
		});
	});
}
//properties
$Users.primaryKeys = [];
$Users.components = [];
$Users.modules = [];
$Users.views = [];
$Users.moduleName = 'users';
$Users.icon = 'fa-users';

$Users.selectGroup = {};
$Users.gidSelected = {};

//autorun
new Users();