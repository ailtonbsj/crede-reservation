//construct
function DynamicSelect(domId, apiModule, adapterCallback){
	SelectInput.call(this, domId);
	this.apiModule = apiModule;
	this.adapterCallback = adapterCallback;
}
//heritage
DynamicSelect.prototype = Object.create(SelectInput.prototype);
$DynamicSelect = DynamicSelect.prototype;
//properties
this.apiModule = '';
this.adapterCallback = null;
//methods
$DynamicSelect.loadItems = function(callback) {
	var self = this;
	$.post(
	'./api/'+self.apiModule,
	{action: 'listAll'},
	function(raw){
		var res = JSON.parse(raw);
		if(res.status == 'success'){
			$SelectInput.clear.apply(self);
			res.data.map(function(item){
				self.addItem.apply(self,self.adapterCallback(item));
			});
		}
		callback ? callback() : null;
	});
}
$DynamicSelect.clear = function(callback) {
	this.loadItems(callback);
}