
/*************************************************
 *
 * NAV TABS
 * 
 *************************************************/
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('.navbar-toggle').click(function(){
	$('.alert').addClass('animated fadeOutDown');
})

/*************************************************
 *
 * PROMPT
 * 
 *************************************************/
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

/*************************************************
 *
 * DELETIIONS
 * 
 *************************************************/

// Delete user account prompt
$('#delete-account').click(function(){	
	openModule();
	$('#delete-account-module').fadeIn();
});

// Delete credential
$('.credential-wrap .btn-delete').click(function(){
	event.preventDefault();
	var id 		= $(this).attr('id');
	var data	= {_method: 'delete' };
	
	$.ajax({
	    url:  '/credentials/'+id,
	    type: 'DELETE',
	    data:data,
	    success: function(result) {
	        $('#credential-wrap-'+id).fadeOut(300)	        
	    }
	  });	
})


/**
 * Delete the users account via ajax
 */
// $.get('/ajax', function(data){
// 	console.log(data);
// });







