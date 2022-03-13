//construct
function Places(){
	Module.apply(this); //super
	this.components['name'] = new TextInput(this.createFormId('name'));
	this.components['owner'] = new TextInput(this.createFormId('owner'));
}
//heritage
Places.prototype = Object.create(Module.prototype);
$Places = Places.prototype;
//properties
$Places.primaryKeys = [];
$Places.components = [];
$Places.moduleName = 'places';
$Places.icon = 'fa-map';

//autorun
new Places();
