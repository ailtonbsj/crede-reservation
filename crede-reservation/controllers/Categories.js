//construct
function Categories(){
	Module.apply(this); //super

	this.components['name'] = new TextInput(this.createFormId('name'));
}
//heritage
Categories.prototype = Object.create(Module.prototype);
$Categories = Categories.prototype;
//properties
$Categories.moduleName = 'categories';
$Categories.components = [];
$Categories.icon = 'fa-tags';

//autorun
new Categories();