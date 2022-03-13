//construct
function TimeInput(domId) {
	this.formatView = 'HH:mm:ss';
	this.formatModel = this.formatView;
	DateTimeInput.call(this, domId);
}
//heritage
TimeInput.prototype = Object.create(DateTimeInput.prototype);
$TimeInput = TimeInput.prototype;
$TimeInput.constructor = TimeInput;
