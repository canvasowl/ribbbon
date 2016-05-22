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
};

var closeModule = function(){
	var module 		= $('div#module');
	var moduleForm 	= $('.module-form');
	module.fadeOut();
	moduleForm.fadeOut();
    $('body').removeClass('stop-scrolling');
};

$('#btn-no').click(function(){
	closeModule();
});
/*************************************************
 *
 * FORM EVENTS
 * 
 *************************************************/
/**
 * TODO: Needs to handled by Vue.js
 */
// function showForm(selector, clientId, index){
//	clientId = clientId || false;
//	if(index === false || index === undefined){
//		index = false;
//	}else{
//		client.tempClientIndex = index;
//	}
//	if(clientId !== false){
//		client.newProject.client_id = clientId;
//	}
//
//	$(selector).show();
//	$(selector).find('input[type=text],textarea,select').filter(':visible:first').focus();
//	event.preventDefault();
//}

$(document).ready(function(){
	// Toggle minimize popup form
	$('.popup-form .ion-minus-round').click(function(){
		// If the form is not expanded expand it
		if ( !$(this).parents(".popup-form").hasClass('minimized') ) {
			$(this).attr('title', "Expand");
		  	$(this).parents(".popup-form").addClass("minimized");
		}else{
			$(this).attr('title', "Minimze");
		  	$(this).parents(".popup-form").removeClass("minimized");
		}		
	});
	// Close popup form
	$('.popup-form .ion-close-round').click(function(){
		$(this).attr('title', "Minimze");
	  	$(this).parents(".popup-form").removeClass("minimized");		
	  	$(this).parents(".popup-form").hide();
	});	
});