//construct
function MaskedInput(domId, maskObj) {
	this.name = domId;
	if($(domId)[0] == undefined) console.log('ALERT: Component not found in View!');
	else this.iMask = new IMask($(domId)[0], maskObj);
}
//heritage
MaskedInput.prototype = Object.create(Component.prototype);
$MaskedInput = MaskedInput.prototype;
$MaskedInput.constructor = MaskedInput;
//properties
$MaskedInput.iMask = null;
$MaskedInput.name = null;
//methods
$MaskedInput.setValue = function(value){
	this.iMask.value = value.toString();
}
$MaskedInput.getValue = function(){
	return this.iMask.unmaskedValue;
}
$MaskedInput.clear = function(callback){
	this.iMask.value = '';
	callback ? callback() : null;
}