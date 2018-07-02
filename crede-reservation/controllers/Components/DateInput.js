//construct
function DateInput(domId) {
	this.formatView = 'DD/MM/YYYY';
	this.formatModel = 'YYYY-MM-DD';
	DateTimeInput.call(this, domId);
}
//heritage
DateInput.prototype = Object.create(DateTimeInput.prototype);
$DateInput = DateInput.prototype;
$DateInput.constructor = DateInput;
