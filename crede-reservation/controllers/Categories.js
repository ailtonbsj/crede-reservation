//construct
function Categories(){
	Module.apply(this); //super
}
//heritage
Categories.prototype = Object.create(Module.prototype);
$Categories = Categories.prototype;
//properties
$Categories.moduleName = 'categories';
$Categories.columns = ['name'];
$Categories.icon = 'fa-tags';

var categoria = new Categories();