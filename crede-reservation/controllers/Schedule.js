//construct
function Schedule(){
	Module.apply(this); //super
}
//heritage
Schedule.prototype = Object.create(Module.prototype);
$Schedule = Schedule.prototype;
//properties
$Schedule.primaryKeys = [];
$Schedule.components = [];
// $Schedule.modules = [];
// $Schedule.views = [];
$Schedule.moduleName = 'schedule';
$Schedule.icon = 'fa-sliders';

$Schedule.loadDataTable = function(){
	var self = this;

	self.listAll(function(res){
		if(res){
			var datasource = res.map(function(it){
				return {
					inittime: it.inittime,
					finaltime: it.finaltime,
					text: it.description,
					yAxis: it.place
				}
			});
			new Orkidea.Schedule('schedule', datasource,{});
		}
	});

	$('#view-table-'+self.moduleName+' .overlay').addClass('hide');
}

// $Schedule.filteredBy = {};

//autorun
new Schedule();