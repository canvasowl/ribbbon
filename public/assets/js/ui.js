$(document).ready(function(){
	
	// Mega Toggle Menu		
	$(".mega-menu .links a").click(function(){		
		event.preventDefault()

		$(".mega-menu .links a").removeClass("active");
		$(this).addClass("active");

		var id = "#" + $(this).attr("data-id");
		$(".mega-menu .content .item").hide();
		$(id).show();
		
	});	

})


