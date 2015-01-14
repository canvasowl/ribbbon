$.ajax({
    url:  '/projects/'+id+'/invite',
    type: 'GET',
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



var doughnutData = [
		{
			value: 300,
			color:"#B75DB6",
			highlight: "#944B94",
			label: "Incomplete Tasks"
		},
		{
			value: 50,
			color: "#40F4C4",
			highlight: "#18FFC6",
			label: "Completed Tasks"
		}
	];

	window.onload = function(){
		var ctx = document.getElementById("chart-area").getContext("2d");
		window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
	};


