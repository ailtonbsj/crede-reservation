//construct
function RealInput(domId) {
	MaskedInput.call(this, domId,
		{ mask: Number, signed: true, scale: 100 }); //super
}
//heritage
RealInput.prototype = Object.create(MaskedInput.prototype);
$RealInput = RealInput.prototype;
$RealInput.constructor = RealInput;
//methods
$RealInput.isValid = function(){
	if(!RealInput.isReal(this.getValue())){
		this.log = 'Its not a real number';
		return false;
	}
	return true;
}
//static methods
RealInput.isReal = function(value) {
	value = value.replace(/,/g , ".");
	if(value == '') return false;
	else if(parseFloat(value) == NaN) return false;
	return true;
};