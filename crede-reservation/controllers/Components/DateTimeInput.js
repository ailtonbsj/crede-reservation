//construct
function DateTimeInput(domId) {
	if($(domId)[0] == undefined) throw 'Component not found in View!';
	this.name = domId;
    this.picker = $(domId).datetimepicker({
		locale: 'pt-BR',
		ignoreReadonly: true,
		format: this.formatView
	});
	if(Useful.isMobile){
		$(this.name).attr('readonly', true)
		.css('background-color','#fff').css('opacity', 1);
		//background-color: #fff !important; opacity: 1;
	}
}
//heritage
DateTimeInput.prototype = Object.create(Component.prototype);
$DateTimeInput = DateTimeInput.prototype;
//properties
$DateTimeInput.name = null;
$DateTimeInput.picker = null;
$DateTimeInput.formatView = 'DD/MM/YYYY HH:mm:ss';
$DateTimeInput.formatModel = 'YYYY-MM-DD HH:mm:ss';
//methods
$DateTimeInput.setValue = function(value){
	var raw = moment(value,this.formatModel).format(this.formatView);
	this.picker.val(raw);
}
$DateTimeInput.getValue = function(){
	var raw = this.picker.val();
	return moment(raw,this.formatView).format(this.formatModel);
}
$DateTimeInput.isValid = function(){
	var raw = this.picker.val();
	if(raw == ''){
		this.log = 'Field is empty!';
		return false;
	}
	var res = moment(raw,this.formatView).isValid();
	if(!res){
		this.log = 'Its not a valid format!';
		return false;
	}
	return true;
}
$DateTimeInput.clear = function(callback){
	this.picker.data('DateTimePicker').clear();
	callback ? callback() : null;
}