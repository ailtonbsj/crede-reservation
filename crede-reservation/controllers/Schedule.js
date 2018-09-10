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
$Schedule.moduleName = 'schedule';
$Schedule.icon = 'fa-sliders';

$Schedule.loadDataTable = function(){
	var self = this;

	self.listAll(function(res){
		if(res){
			// var grupArr = [];
			// window.asd = grupArr;
			// res.map(function(item){
			// 	$.post('api/group_humanid',{gid: item.gid},function(hid){
			// 		var hidL = hid.split('/');
			// 		if(grupArr[item.gid] === undefined) grupArr[item.gid] = hidL[hidL.length-1];
			// 	});
			// });

			// $(document).ajaxComplete(function(){
			// 	var activitiesByGroup = [];
			// 	res.map(function(activity){	
			// 		if(activitiesByGroup[activity.gid] === undefined) activitiesByGroup[activity.gid] = [];
			// 		activitiesByGroup[activity.gid].push(activity);
			// 	});
			// // for(gid in activitiesByGroup){
			// // 	console.log(grupArr);
			// // 	console.log(gid);
			// // 	console.log(activitiesByGroup[gid]);
			// // }
			// });
			var datasource = res.map(function(it){
				return {
					inittime: self.transformField('inittime',it.inittime),
					finaltime: self.transformField('finaltime',it.finaltime),
					text: it.description,
					yAxis: it.place
				}
			});
			new Orkidea.Schedule('schedule', datasource,{});
		}
	});
	$('#view-table-'+self.moduleName+' .overlay').addClass('hide');
}

//autorun
new Schedule();