//construct
function BooleanToggle(domId){
	this.toggle = $(domId);
	if(this.toggle.attr('data-toggle') != 'toggle') this.toggle.bootstrapToggle();
}
//heritage
BooleanToggle.prototype = Object.create(Component.prototype);
$BooleanToggle = BooleanToggle.prototype;
//properties
$BooleanToggle.name = null;
//methods
$BooleanToggle.setValue = function(value) {
	value ? this.toggle.bootstrapToggle('on') : this.toggle.bootstrapToggle('off');
}
$BooleanToggle.getValue = function() {
	return this.toggle.is(':checked');
}
$BooleanToggle.isValid = function() { return true; }

$BooleanToggle.clear = function() {
	this.toggle.bootstrapToggle('off');
}