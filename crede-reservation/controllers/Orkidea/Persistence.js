//construct
function Persistence() {
	//abstract
	if(this.__proto__ === Persistence.prototype) throw 'abstract class';
	if(this.moduleName === undefined) throw 'must have the property moduleName';
}
$Persistence = Persistence.prototype;
//properties
$Persistence.filteredBy = [];
//methods
$Persistence.insertItem = function (dataOfColumns, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'insertItem', obj: dataOfColumns },
    function(res){
      console.log('executou');
      console.log(res);
      var raw = JSON.parse(res);
      if(raw.status == 'success') callback(raw.data);
      else if(raw.status == 'shock'){
        var msg = raw.data.reduce(function(acc,item){
          return acc + item.description + "\n( "+item.inittime+S.CrashMsgPrep+ item.finaltime +" ) \n";
        }, S.CrashMsg+"\n\n");
        alert(msg);
      }
      else alert(raw.data);
  }).fail(function(){
    alert(S['FailAjax']);
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
      else if(raw.status == 'shock'){
        var msg = raw.data.reduce(function(acc,item){
          return acc + item.description + "\n( "+item.inittime+S.CrashMsgPrep+ item.finaltime +" ) \n";
        },S.CrashMsg+"\n\n");
        alert(msg);
      }
      else alert(raw.data);
  }).fail(function(){
    alert(S['FailAjax']);
  }); 
}
$Persistence.listAll = function (callback) {
  var self = this;
  var obj = { action: 'listAll' };
  if(Object.keys(self.filteredBy).length > 0){
    var filtered = {};
    for(item in self.filteredBy) Object.assign(filtered, self.filteredBy[item]);
    obj.filteredBy = filtered;
  }
	$.post(
  		'api/'+self.moduleName,
  		obj,
  		function(res){
  			var raw = JSON.parse(res);
  			if(raw.status == 'success') callback(raw.data);
  			else callback(false);
  	});
}
$Persistence.listItem = function (primaryKeys, callback) {
  var self = this;
  $.post(
    'api/'+self.moduleName,
    { action: 'listItem', obj: primaryKeys },
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
  }).fail(function(){
    alert(S['FailAjax']);
  });
}
$Persistence.removeItensFree = function () {
}
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
