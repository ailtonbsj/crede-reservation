//construct
function IntegerInput(domId) {
	MaskedInput.call(this, domId,
		{ mask: Number, signed: true, scale: 0 }); //super
}
//heritage
IntegerInput.prototype = Object.create(MaskedInput.prototype);
$IntegerInput = IntegerInput.prototype;
//methods
$IntegerInput.isValid = function(){
	if(IntegerInput.isInteger(this.getValue())) return true;
	return false;
}
//static methods
IntegerInput.isInteger = function(value) {
	var value = parseInt(value);
	return typeof value === "number" &&
	isFinite(value) && 
    Math.floor(value) === value;
};