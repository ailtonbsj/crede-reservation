//construct
function Permissions(){
	Module.apply(this); //super
	this.primaryKeys = [];
	this.primaryKeys['username'] = new TextInput(this.createFormId('username'));
	// this.primaryKeys['module'] = new SelectInput(this.createFormId('module'));
	// this.primaryKeys['module'].addItem('valor1','valor2');

	this.primaryKeys['module'] = new DynamicSelect(
		this.createFormId('module'),'modules', function(item){
			return [Useful.convertToCamelCase(item,' '),item];
		//return [item.description+' ( '+item.owner+' )', item.id];
	});

	this.components['c'] = new BooleanToggle(this.createFormId('c'));
	this.components['r'] = new BooleanToggle(this.createFormId('r'));
	this.components['u'] = new BooleanToggle(this.createFormId('u'));
	this.components['d'] = new BooleanToggle(this.createFormId('d'));
	this.components['priority'] = new NaturalInput(this.createFormId('priority'));

	this.transformColumn['c'] = 'as-checkbox';
	this.transformColumn['r'] = 'as-checkbox';
	this.transformColumn['u'] = 'as-checkbox';
	this.transformColumn['d'] = 'as-checkbox';
}
//heritage
Permissions.prototype = Object.create(Module.prototype);
$Permissions = Permissions.prototype;
//properties
$Permissions.moduleName = 'permissions';
$Permissions.icon = 'fa-key';
$Permissions.primaryKeys = [];
$Permissions.components = [];
$Permissions.transformColumn = [];

$Permissions.superModule = Module.modules['users'];
//foreignKeyName { nativeKeyName: value }
$Permissions.filteredBy = {
	name: {username: ''}
};

//autorun
new Permissions();
