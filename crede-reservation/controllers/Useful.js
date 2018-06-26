//construct
function Useful(){}
//static method
Useful.convertToCamelCase = function(input,concat){
	var concat = concat || '';
	return input.replace(/-/g, '_').split('_').map(function(tk){
		return tk.charAt(0).toUpperCase()+tk.slice(1);
	}).join(concat);
}
