
// Home page tab-nav
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

/**
 * Popup Modules
 */
var openModule = function(){
	var module = $('div#module'); 	
	module.height( $(document).height() );
	module.width( $(document).width() );
	module.fadeIn();
}

var closeModule = function(){
	var module 		= $('div#module');
	var moduleForm 	= $('.module-form');
	module.fadeOut();
	moduleForm.fadeOut();
}

$('#btn-no').click(function(){
	closeModule();
});


/**
 * Open the popup module to delete the 
 * useres account
 */
$('#delete-account').click(function(){	
	openModule();
	$('#delete-account-module').fadeIn();
});

/**
 * Delete the users account via ajax
 */
// $.get('/ajax', function(data){
// 	console.log(data);
// });







