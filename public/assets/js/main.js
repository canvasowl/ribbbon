//var randomInt = function randomIntFromInterval(min,max) {
//    return Math.floor(Math.random()*(max-min+1)+min);
//}

/*************************************************
 *
 * Header hug special drop shadow
 *
 *************************************************/
$(window).scroll(function(){
   var height  = $(document).scrollTop();

   if(height > 42){
       $('.hug-hudHeader, .hug-homeHeader').addClass("special-shadow");
   }else{
       $('.hug-hudHeader, .hug-hudHeader').removeClass("special-shadow");
   }
});

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
 * CREDENTIALS INPUT DISABLED DEPENDING ON RADIO CHOICE
 *
 *************************************************/
$('.dynamic-form input[type="radio"]').click(function(){
	if( $('#other').is(':checked') ){
		$('.dynamic-form .other').prop('disabled', true);
	}

	if( $('#ftp').is(':checked') ){
		$('.dynamic-form .other').prop('disabled', false);
	}
});



/*************************************************
 *
 * PROMPT
 * 
 *************************************************/
var openModule = function(){
	var module = $('div#module');
    var top = $(document).scrollTop();
	module.height( $(document).height() );
	module.width( $(document).width() );
	module.fadeIn();
    $('.module-form').css('margin-top', top);
    $('#close').css('margin-top', top + 20);
    $('body').addClass('stop-scrolling');
}

var closeModule = function(){
	var module 		= $('div#module');
	var moduleForm 	= $('.module-form');
	module.fadeOut();
	moduleForm.fadeOut();
    $('body').removeClass('stop-scrolling');
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







