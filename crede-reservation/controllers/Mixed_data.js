//construct
function Mixed_data(){
	Module.apply(this); //super
}
//heritage
Mixed_data.prototype = Object.create(Module.prototype);
$Mixed_data = Mixed_data.prototype;
//properties
$Mixed_data.moduleName = 'mixed_data';
$Mixed_data.columns = ['fullname', 'age', 'datetime_in', 'born_date', 'born_hour', 'has_work', 'salary', 'yield_in'];
$Mixed_data.icon = 'fa-tags';

var mixedData = new Mixed_data();