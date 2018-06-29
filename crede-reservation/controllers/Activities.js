//construct
function Activities(){
	Module.apply(this); //super
	this.components['description'] = new TextInput(this.createFormId('description'));
	this.components['inittime'] = new DateTimeInput(this.createFormId('inittime'));
	this.components['finaltime'] = new DateTimeInput(this.createFormId('finaltime'));
	//this.components['place'] =  new TextInput(this.createFormId('place'));
	this.components['place'] = new DynamicSelect(this.createFormId('place'),'places', function(item){
		return [item.name, item.id];
	});
	this.components['owner'] = new DynamicSelect(this.createFormId('owner'),'users', function(item){
		return [item.name, item.name];
	});
}
//heritage
Activities.prototype = Object.create(Module.prototype);
$Activities = Activities.prototype;
//properties
$Activities.primaryKeys = [];
$Activities.components = [];
$Activities.moduleName = 'activities';
$Activities.icon = 'fa-calendar';

//autorun
new Activities();