
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

$('#ftp').click(function(){
	// var form = '<div class="col-xs-12 col-md-4 no-padding-left no-padding-right dynamic-form">
 //        	<form method="post" action="/projects/cre">
 //        		<input class="form-control" type="text" name="name" placeholder="Name" autofocus>					            		
 //        		<input class="form-control" type="text" name="hostname" placeholder="Hostname">
 //        		<input class="form-control" type="text" name="username" placeholder="Username">
 //        		<input class="form-control" type="text" name="password" placeholder="Password">
 //        		<br>
 //        		<input class="btn btn-primary pull-right" type="submit" value="Save">
 //        		<div class="clearfix"></div>
 //        	</form>
 //    	</div>';

	$('.ftp-panel-body')
	.append('<div class="col-xs-12 col-md-4 no-padding-left no-padding-right dynamic-form">')
	.append('<form method="post" action="/projects/cre">')
	.append('<input class="form-control" type="text" name="name" placeholder="Name" autofocus>')
	.append('<input class="form-control" type="text" name="hostname" placeholder="Hostname">')
	.append('<input class="form-control" type="text" name="username" placeholder="Username">')
	.append('<input class="form-control" type="text" name="password" placeholder="Password"><br>')
	.append('<input class="btn btn-primary pull-right" type="submit" value="Save"><div class="clearfix"></div>')
	.append('</form></div>');
})





