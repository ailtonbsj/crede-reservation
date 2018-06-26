//construct
function MixedData(){
	Module.apply(this); //super

	this.components['fullname'] = new TextInput(this.createFormId('fullname'));

	this.components['age'] = new NaturalInput(this.createFormId('age'));
	this.components['age'].iMask.masked['max'] = 140;

	this.components['datetime_in'] = new DateTimeInput(this.createFormId('datetime_in'));

	this.components['born_date'] = new DateInput(this.createFormId('born_date'));

	this.components['born_hour'] = new TimeInput(this.createFormId('born_hour'));

	this.components['has_work'] = new BooleanToggle(this.createFormId('has_work'));

	this.components['salary'] = new MoneyInput(this.createFormId('salary'));

	this.components['yield_in'] = new RealInput(this.createFormId('yield_in'));
}
//heritage
MixedData.prototype = Object.create(Module.prototype);
$MixedData = MixedData.prototype;
//properties
$MixedData.moduleName = 'mixed_data';
$MixedData.components = [];
$MixedData.icon = 'fa-info';

//autorun
new MixedData();
