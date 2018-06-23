//construct
function Users(){
	Module.apply(this); //super
}
//heritage
Users.prototype = Object.create(Module.prototype);
$Users = Users.prototype;
//properties
$Users.moduleName = 'users';
$Users.columns = ['pass','fullname'];
$Users.primaryKey = 'name';
$Users.icon = 'fa-users';

var users = new Users();