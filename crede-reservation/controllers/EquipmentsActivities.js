//construct
function EquipmentsActivities(){
	Module.apply(this); //super
	this.primaryKeys = [];
	this.primaryKeys['equipment'] = new DynamicSelect(
		this.createFormId('equipment'),'equipments', function(item){
		return [item.name+' ( '+item.owner+' )',item.id];
	});
	this.primaryKeys['activity'] = new DynamicSelect(
		this.createFormId('activity'),'activities', function(item){
		return [item.description+' ( '+item.owner+' )', item.id];
	});
}
//heritage
EquipmentsActivities.prototype = Object.create(Module.prototype);
$EquipmentsActivities = EquipmentsActivities.prototype;
//properties
$EquipmentsActivities.primaryKeys = [];
$EquipmentsActivities.components = [];
$EquipmentsActivities.moduleName = 'equipments_activities';
$EquipmentsActivities.icon = 'fa-tasks';

//autorun
new EquipmentsActivities();