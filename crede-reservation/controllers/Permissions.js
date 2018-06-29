//construct
function Permissions(){
	Module.apply(this); //super
	this.primaryKeys = [];
	this.primaryKeys['username'] = new DynamicSelect(this.createFormId('username'), 'users', function(item){
		return [item.name,item.name];
	});
	this.primaryKeys['module'] = new TextInput(this.createFormId('module'));
	this.components['c'] = new BooleanToggle(this.createFormId('c'));
	this.components['r'] = new BooleanToggle(this.createFormId('r'));
	this.components['u'] = new BooleanToggle(this.createFormId('u'));
	this.components['d'] = new BooleanToggle(this.createFormId('d'));
	this.components['priority'] = new TextInput(this.createFormId('priority'));

}
//heritage
Permissions.prototype = Object.create(Module.prototype);
$Permissions = Permissions.prototype;
//properties
$Permissions.moduleName = 'permissions';
$Permissions.primaryKeys = [];
$Permissions.components = [];
$Permissions.icon = 'fa-key';

//autorun
new Permissions();
