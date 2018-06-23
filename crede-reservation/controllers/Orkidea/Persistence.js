//construct
function Persistence() {
	//abstract
	if(this.__proto__ === Persistence.prototype) throw 'abstract class';
	if(this.moduleName === undefined) throw 'must have the property moduleName';
}
$Persistence = Persistence.prototype;
//methods
$Persistence.insertItem = function (dataOfColumns, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'insertItem', obj: dataOfColumns },
    function(res){
      var raw = JSON.parse(res);
      if(raw.status == 'success') callback(raw.data);
      else callback(false);
  });
}
$Persistence.updateItem = function (dataOfColumns, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'updateItem', obj: dataOfColumns },
    function(res){
      var raw = JSON.parse(res);
      if(raw.status == 'success') callback(raw.data);
      else callback(false);
  }); 
}
$Persistence.listAll = function (callback) {
  var self = this;
	$.post(
  		'api/'+self.moduleName,
  		{ action: 'listAll' },
  		function(res){
  			var raw = JSON.parse(res);
  			if(raw.status == 'success') callback(raw.data);
  			else callback(false);
  	});
}
$Persistence.listItem = function (id, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'listItem', obj: id },
    function(res){
      var raw = JSON.parse(res);
      if(raw.status == 'success') callback(raw.data);
      else callback(false);
  });
}
$Persistence.removeItem = function (id, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'removeItem', obj: id },
    function(res){
      var raw = JSON.parse(res);
      if(raw.status == 'success') callback(true);
      else callback(false);
  });
}
$Persistence.removeItensFree = function () {}
$Persistence.listPermissions = function (callback) {
  var self = this;
  if(self.permissions !== undefined) {
    callback(self.permissions);
  } else {

  $.post(
    'api/'+self.moduleName,
    { action: 'listPermissions' },
    function(res){
      var raw = JSON.parse(res);
      if(raw.status == 'success') {
         self.permissions = raw.data;
        callback(self.permissions);
      }
      else callback(false);
  });
  }
}