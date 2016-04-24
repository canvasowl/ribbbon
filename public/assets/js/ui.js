/*************************************************
 *
 * MEGA MENU
 *
 *************************************************/
function megaMenuInit(){	
	$(".mega-menu .links a").click(function(){		
		event.preventDefault();

		$(".mega-menu .links a").removeClass("active").addClass("inactive");
		$(this).removeClass("inactive").addClass("active");

		var id = "#" + $(this).attr("data-id");
		$(".mega-menu .content .item").hide();
		$(id).show();
	});
}
/*************************************************
 *
 * NAV TABS
 *
 *************************************************/
$('#myTab a').click(function (e) {
	e.preventDefault();
	$(this).tab('show')
});

$('.navbar-toggle').click(function(){
	$('.alert').addClass('animated fadeOutDown');
});
/*************************************************
 *
 * PROMPT AND SHEET
 *
 *************************************************/
function showSheet(){
	$("#sheet").height($(document).height()).show();
    $("body").addClass("noScroll");
}

function makePrompt(title, msg ,cancelTxt, confirmTxt){
	var newMarginTop = $(document).scrollTop() + 100;

	$("#pop-up-prompt").show().addClass("fadeInUp");
	$("#pop-up-prompt h3").text(title);
	$("#pop-up-prompt p").text(msg);
	$("#pop-up-prompt #cancel-btn").text(cancelTxt);
	$("#pop-up-prompt #confirm-btn").text(confirmTxt);
	$("#pop-up-prompt").css("margin-top", newMarginTop);
}

function closePrompt(){
    $("#sheet, #pop-up-prompt").hide();
    $("body").removeClass("noScroll");
}

