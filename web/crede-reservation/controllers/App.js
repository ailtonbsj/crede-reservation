//construct
function App(){
	this.generateMenu();
	this.generateBtnLogout();
}
$App = App.prototype;
//methods
$App.generateMenu = function() {
	var mainMenu = $('#main-menu');
	mainMenu.append('<li class="header">'+S.MainNav+'</li>');
	var tmpItemMenu = $($('#item-menu')[0].content);
	for(i in Module.modules){
		var itemMenu = tmpItemMenu.clone();
		itemMenu.find('a').attr('data-module', Module.modules[i].moduleName).addClass('action-item-menu');
		itemMenu.find('span').html(S[Module.modules[i].moduleName]);
		itemMenu.find('i').addClass(Module.modules[i].icon);
		mainMenu.append(itemMenu);
	}
	$('.action-item-menu').click(function(anchor){
		var nameModule = this.getAttribute('data-module');
		Module.modules[nameModule].showTableView();
	});
}
$App.generateBtnLogout = function(){
	$('#btn-logout').click(function(){
      $.get('api/logout', function(res){
        if(JSON.parse(res)['status'] == 'success') window.location = 'index.php';
      });
    });
}