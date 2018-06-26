//construct
function NaturalInput(domId) {
	MaskedInput.call(this, domId,
		{ mask: Number, signed: false, scale: 0 }); //super
}
//heritage
NaturalInput.prototype = Object.create(MaskedInput.prototype);
$NaturalInput = NaturalInput.prototype;
//methods
$NaturalInput.isValid = function(){
	var value = this.getValue();
	if( value == '' ) {
		this.log = 'Field is empty';
		return false;
	}
	if(!NaturalInput.isNatural(value)) {
		this.log = 'Is not a positive integer!';
		return false;
	} 
	return true;
}
//static methods
NaturalInput.isNatural = function (n) {
    var n1 = Math.abs(n),
        n2 = parseInt(n, 10);
    return !isNaN(n1) && n2 === n1 && n1.toString() === n;
}