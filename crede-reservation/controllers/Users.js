//construct
function Users(){
	Module.apply(this); //super

	this.primaryKeys = [];
	this.primaryKeys['name'] = new TextInput(this.createFormId('name'));
	this.components['pass'] = new TextInput(this.createFormId('pass'));
	this.components['fullname'] = new TextInput(this.createFormId('fullname'));
}
//heritage
Users.prototype = Object.create(Module.prototype);
$Users = Users.prototype;
//properties
$Users.moduleName = 'users';
$Users.components = [];
$Users.icon = 'fa-users';

//autorun
new Users();