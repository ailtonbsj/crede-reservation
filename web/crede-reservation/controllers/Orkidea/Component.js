//construct
function Component(){
	if(this.__proto__ === Component.prototype) throw 'abstract class';
}
$Component = Component.prototype;
//abstract methods
$Component.setValue = function(value) {
	throw 'need to be implemented!';
}
$Component.getValue = function() {
	throw 'need to be implemented!';
}
$Component.isValid = function() {
	throw 'need to be implemented!';
}
$Component.clear = function() {
	throw 'need to be implemented!';
}
