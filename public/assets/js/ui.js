// Mega Toggle Menu
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



