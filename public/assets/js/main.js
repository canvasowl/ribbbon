var colors = ['9E5ED4','D45E60','5EBED4','95D45E','D4C35E'];

var randomInt = function randomIntFromInterval(min,max)
{
    return Math.floor(Math.random()*(max-min+1)+min);
}

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


/*************************************************
 *
 * INVITATIONS AND CREATIONS
 * 
 *************************************************/
 // Project invite
$('#project-invite-form .btn').click(function(){
	event.preventDefault();
	var id 		= $(this).attr('id');
	var data 	= $('#project-invite-form form').serialize();
	
	$.ajax({
	    url:  '/projects/'+id+'/invite',
	    type: 'POST',
	    data:data,
	    dataType: 'json',
	    success: function(data) {
	    	// remove all errors and success messages
	    	$('#project-invite-form .error, #project-invite-form .success').html("");

	        // error
	        if (data.success == false) {	        	
	        	$('#project-invite-form .error').html(data.errors.email[0])
	        }
	        // success
	        else{
	        	$('#project-invite-form .success').html(data.success)
	        	$('.members-list').append("<li><p style='background-color:#"+colors[randomInt(0,4)]+";height:40px' class='circle'></p></li>")
	        }
	    }
	  });
})

/**
 * Delete the users account via ajax
 */
// $.get('/ajax', function(data){
// 	console.log(data);
// });







