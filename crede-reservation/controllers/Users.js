//construct
function Users(){
	Module.apply(this); //super
	this.primaryKeys = [];
	this.primaryKeys['name'] = new TextInput(this.createFormId('name'));
	this.components['pass'] = new TextInput(this.createFormId('pass'));
	this.components['fullname'] = new TextInput(this.createFormId('fullname'));

	var self = this;
	$.get('api/groups',{gid: gidH}, function(res){
		var data = JSON.parse(res);
		self.addSelects(
			'#users-form-groups-panel', self.selectGroup,0, data);
	});
}
//heritage
Users.prototype = Object.create(Module.prototype);
$Users = Users.prototype;
//methods
$Users.selectGroup = {};
$Users.gidSelected = {};
$Users.addSelects = function(parentPanel,modelPanel, idLevel, data){
	var self = this;

	$(parentPanel).empty();
	modelPanel = {};

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
			console.log(gidArr.join('/'));

			dataInner = data[selKey];
			modelPanel.children = {};
			self.addSelects(
				'#users-form-panel'+idLevel,
				modelPanel.children, idLevel+1, dataInner);
		});

	}

	
	// if(keys.length > 0) {

	// 	$('#users-form-select-comp'+idN).remove();

	// 	var tmpSel = $('#users-form-groups-temp')[0].content.cloneNode(true);
	// 	$(tmpSel).find('div').attr('id','users-form-select-comp'+idN);
	// 	$(tmpSel).find('select').attr('id','users-form-select'+idN);
	// 	$(tmpSel).find('label').html('Group '+idN);
	// 	$('#users-form-groups-panel').append(tmpSel);
	// 	self.selectGroups[idN] = new SelectInput('#users-form-select'+idN);

	// 	slt = self.selectGroups[idN];
	// 	slt.addItem('Select a group level '+idN,'');
	// 	keys.map(function(key){
	// 		slt.addItem(key,key);
	// 	});
	// 	slt.select.change(function(res){
	// 		console.log(data);
	// 		data = data[slt.getValue()];
	// 		self.addSelects(idN+1, data);
	// 	});
	// }
}
//properties
$Users.primaryKeys = [];
$Users.components = [];
$Users.modules = [];
$Users.views = [];
$Users.moduleName = 'users';
$Users.icon = 'fa-users';
//methods
// $Users.clearFormView = function(){
// 	Module.prototype.clearFormView.apply(this);
// 	var slt = new SelectInput('#form-group0-users');
// 	slt.addItem('OLA', 'MUNDO');
// 	$.get('api/groups',{gid: gidH}, function(res){
// 		var data = JSON.parse(res);
// 		var slt = new SelectInput('form-group0-users');
// 		Object.keys(data).map(function(key){
// 			slt.addItem(key,key);
// 		});
// 	});
// }


//autorun
new Users();