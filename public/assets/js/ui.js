/*************************************************
 *
 * MEGA MENU
 *
 *************************************************/
function megaMenuInit(){	
	$(".mega-menu .links a").click(function(){		
		event.preventDefault()

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
	e.preventDefault()
	$(this).tab('show')
})

$('.navbar-toggle').click(function(){
	$('.alert').addClass('animated fadeOutDown');
});



