//construct
function MyActivities() {
	var self = this;
	Module.apply(this); //super
	this.components['description'] = new TextInput(this.createFormId('description'));
	this.components['inittime'] = new DateTimeInput(this.createFormId('inittime'));
	this.components['finaltime'] = new DateTimeInput(this.createFormId('finaltime'));
	//this.components['place'] =  new TextInput(this.createFormId('place'));
	this.components['place'] = new DynamicSelect(this.createFormId('place'), 'places', function (item) {
		return [item.name + ' ( ' + item.owner + ' )', item.id];
	});
	this.components['owner'] = new TextInput(this.createFormId('owner'));
	this.components['placename'] = new TextInput(this.createFormId('placename'));

	this.transformColumn['inittime'] = 'as-brazildatetime';
	this.transformColumn['finaltime'] = 'as-brazildatetime';

	this.listPermissions(function () {
		self.filteredBy = {
			my_activities: { owner: self.permissions.username }
		};
	});
	console.log(window.rawmodel);
	$('#add-gcalendar').on('click', function () {
		var model = {
			id: window.rawmodel.id,
			summary: window.rawmodel.description,
			description: "<b>Equipamentos:</b> \n" + ( window.rawmodeltable.map(o => o.equipmentname).join("\n") )
			 + "\n<b>Criado por:</b> " + window.rawmodel.owner,
			location: window.rawmodel.placename,
			start: window.rawmodel.inittime,
			end: window.rawmodel.finaltime
		};
		$.post('api/google-calendar', model, function (res) {
			var raw = JSON.parse(res);
			if (raw.link != undefined) {
				$('#add-gcalendar').hide();
				$('#show-gcalendar').attr('href', 'https://www.google.com/calendar/event?eid=' + raw.link).show();
			} else {
				alert(raw.msg);
			}
		}).fail(function () {
			alert(S['FailAjax']);
		});

	});
	$('#update-gcalendar').on('click', function (obj) {
		var model = {
			id: window.rawmodel.id,
			summary: window.rawmodel.description,
			description: "<b>Equipamentos:</b> \n" + ( window.rawmodeltable.map(o => o.equipmentname).join("\n") )
			 + "\n<b>Criado por:</b> " + window.rawmodel.owner,
			location: window.rawmodel.placename,
			start: window.rawmodel.inittime,
			end: window.rawmodel.finaltime,
			idEventCalendar: window.rawmodel.id_event_calendar
		};
		$.post('api/google-calendar', model, function(res) {
			var raw = JSON.parse(res);
			if (raw.link != undefined) {
				alert("Atualizado com Sucesso!");
			} else {
				alert("Erro!");
			}
		});
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