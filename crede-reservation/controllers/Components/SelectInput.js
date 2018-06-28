//construct
function SelectInput(domId){
	this.select = $(domId);
	if(this.select[0] == undefined) throw 'Component not found in View!';
	this.select.select2();
	this.search = this.select.data('select2').dropdown.$search;
}
//heritage
SelectInput.prototype = Object.create(Component.prototype);
$SelectInput = SelectInput.prototype;
//properties
this.select = null;
this.search = null;
//methods
$SelectInput.setValue = function(value) {
	this.select.val(value).trigger('change');
}
$SelectInput.getValue = function() {
	return this.select.val();
}
$SelectInput.getLabel = function() {
	return this.select.find('option:selected').text();
}
$SelectInput.isValid = function() {
	var value = this.getValue();
	if(value == ''){
		this.log = 'value is empty';
		return false;
	}
	return true;
}
$SelectInput.clear = function() {
	this.select.empty();
}
$SelectInput.addItem = function(label, value) {
	this.select.append('<option value="'+value+'">'+label+'</option>');
}
$SelectInput.getSearchValue = function() {
	return this.search.val();
}