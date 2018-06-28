//construct
function MaskedInput(domId, maskObj) {
	if($(domId)[0] == undefined) throw 'Component not found in View!';
	this.name = domId;
	this.iMask = new IMask($(domId)[0], maskObj);
}
//heritage
MaskedInput.prototype = Object.create(Component.prototype);
$MaskedInput = MaskedInput.prototype;
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
$MaskedInput.clear = function(){
	this.iMask.value = '';
}