//construct
function Equipments(){
	Module.apply(this); //super

	this.components['category'] = new DynamicSelect(this.createFormId('category'), 'categories', function(item){
		return [item.name,item.id];
	});
	this.components['name'] = new TextInput(this.createFormId('name'));
	this.components['owner'] = new TextInput(this.createFormId('owner'));

}	

//heritage
Equipments.prototype = Object.create(Module.prototype);
$Equipments = Equipments.prototype;
//properties
$Equipments.moduleName = 'equipments';
$Equipments.components = [];
$Equipments.icon = 'fa-briefcase';

//autorun
new Equipments();
