//construct
function MyActivities(){
	Module.apply(this); //super
	this.components['description'] = new TextInput(this.createFormId('description'));
	this.components['inittime'] = new DateTimeInput(this.createFormId('inittime'));
	this.components['finaltime'] = new DateTimeInput(this.createFormId('finaltime'));
	this.components['place'] = new DynamicSelect(this.createFormId('place'),'places', function(item){
		return [item.name, item.id];
	});
	this.components['owner'] = new TextInput(this.createFormId('owner'));
	this.components['owner'].defaultValue = 'none';
}
//heritage
MyActivities.prototype = Object.create(Module.prototype);
$MyActivities = MyActivities.prototype;
//properties
$MyActivities.primaryKeys = [];
$MyActivities.components = [];
$MyActivities.moduleName = 'my_activities';
$MyActivities.icon = 'fa-calendar';

//autorun
new MyActivities();