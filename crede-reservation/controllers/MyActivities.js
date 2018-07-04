//construct
function MyActivities(){
	Module.apply(this); //super
	this.components['description'] = new TextInput(this.createFormId('description'));
	this.components['inittime'] = new DateTimeInput(this.createFormId('inittime'));
	this.components['finaltime'] = new DateTimeInput(this.createFormId('finaltime'));
	//this.components['place'] =  new TextInput(this.createFormId('place'));
	this.components['place'] = new DynamicSelect(this.createFormId('place'),'places', function(item){
		return [item.name, item.id];
	});
	this.components['owner'] = new TextInput(this.createFormId('owner'));
	this.components['placename'] = new TextInput(this.createFormId('placename'));

	this.transformColumn['inittime'] = 'as-brazildatetime';
	this.transformColumn['finaltime'] = 'as-brazildatetime';

	var self = this;
	this.listPermissions(function(){
		self.filteredBy = {
			my_activities: {owner: self.permissions.username}
		};
	});
}
//heritage
MyActivities.prototype = Object.create(Module.prototype);
$MyActivities = MyActivities.prototype;
//properties
$MyActivities.primaryKeys = [];
$MyActivities.components = [];
$MyActivities.modules = [];
$MyActivities.views = [];
$MyActivities.moduleName = 'my_activities';
$MyActivities.icon = 'fa-calendar-plus-o';

$MyActivities.filteredBy = {};

//autorun
new MyActivities();