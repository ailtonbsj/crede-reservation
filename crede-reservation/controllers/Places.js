//construct
function Places(){
	Module.apply(this); //super
}
//heritage
Places.prototype = Object.create(Module.prototype);
$Places = Places.prototype;
//properties
$Places.moduleName = 'places';
$Places.columns = ['name','owner'];
$Places.icon = 'fa-map';

var places = new Places();