//construct
function MoneyInput(domId) {
	MaskedInput.call(this, domId,
		{ mask: Number, signed: false, scale: 2, padFractionalZeros: true }); //super
}
//heritage
MoneyInput.prototype = Object.create(MaskedInput.prototype);
$MoneyInput = MoneyInput.prototype;
//methods
$MoneyInput.isValid = function(){
	if(!RealInput.isReal(this.getValue())){
		this.log = 'Its not a money format!';
		return false;
	}
	return true;
}