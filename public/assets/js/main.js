
// Home page tab-nav
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

/**
 * Display the create new task pop up module
 */
var openCreateNewTaskModule = function(){
	var module = $('div#module'); 
	
	module.height( $(window).height() );
	module.width( $(window).width() );
	module.fadeIn();
}

var closeModule = function(){
	var module = $('div#module');
	console.log("it worked");
	module.fadeOut();
}