//construct
function Calendar() {
	var self = this;
	Module.apply(this); //super
}
//heritage
Calendar.prototype = Object.create(Module.prototype);
$Calendar = Calendar.prototype;
//properties
$Calendar.modules = [];
$Calendar.views = [];
$Calendar.primaryKeys = [];
$Calendar.components = [];
$Calendar.moduleName = 'calendar';
$Calendar.icon = 'fa-calendar';
//methods
$Calendar.showTableView = function () {
	var gCalFrame = $("iframe#google-calendar")[0];
	gCalFrame.src = gCalFrame.src;
	Module.showView(Module, 'view-table-' + this.moduleName);
	$('#view-table-' + this.moduleName + ' .overlay').addClass('hide');
}

//autorun
new Calendar();
