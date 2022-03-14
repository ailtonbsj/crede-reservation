//construct
function EquipmentsMyActivities(){
	EquipmentsActivities.apply(this); //super
}
//heritage
EquipmentsMyActivities.prototype = Object.create(EquipmentsActivities.prototype);
$EquipmentsMyActivities = EquipmentsMyActivities.prototype;
//properties
// $EquipmentsMyActivities.primaryKeys = [];
// $EquipmentsMyActivities.components = [];
$EquipmentsMyActivities.moduleName = 'equipments_my_activities';
// $EquipmentsMyActivities.icon = 'fa-tasks';

$EquipmentsMyActivities.superModule = Module.modules['my_activities'];
//foreignKeyName { nativeKeyName: value }
// $EquipmentsMyActivities.filteredBy = {
// 	id: {activity: ''}
// };

//autorun
new EquipmentsMyActivities();





// //construct
// function EquipmentsMyActivities(){
// 	Module.apply(this); //super
// 	this.primaryKeys = [];
// 	this.primaryKeys['equipment'] = new DynamicSelect(
// 		this.createFormId('equipment'),'equipments', function(item){
// 		return [item.name+' ( '+item.owner+' )',item.id];
// 	});
// 	this.primaryKeys['activity'] = new TextInput(this.createFormId('activity'));
// 	// this.primaryKeys['activity'] = new DynamicSelect(
// 	// 	this.createFormId('activity'),'activities', function(item){
// 	// 	return [item.description+' ( '+item.owner+' )', item.id];
// 	// });
// }
// //heritage
// EquipmentsMyActivities.prototype = Object.create(Module.prototype);
// $EquipmentsMyActivities = EquipmentsMyActivities.prototype;
// //properties
// $EquipmentsMyActivities.primaryKeys = [];
// $EquipmentsMyActivities.components = [];
// $EquipmentsMyActivities.moduleName = 'equipments_my_activities';
// $EquipmentsMyActivities.icon = 'fa-tasks';

// $EquipmentsMyActivities.superModule = Module.modules['my_activities'];
// //foreignKeyName { nativeKeyName: value }
// $EquipmentsMyActivities.filteredBy = {
// 	id: {activity: ''}
// };

// //autorun
// new EquipmentsMyActivities();