var client = new Vue({
  el: '#client',
  data: {
    client: { name : null, phone_number : null, point_of_contact : null, email : null},
    clients: [],
    newProjectClientId: null,
    newProject: {name: null, project_id: null},
    tempClientIndex: null,
    lastRequest: false,
  },


  ready: function(){
  	this.getClients();
  },

  methods: {
  	getClients: function(){
        $.get( "/api/clients", function( results ) {
            client.clients = results.data;
            Vue.nextTick(function () {
                megaMenuInit();
            })
        }).fail(function(e){
            console.log( "error "+ e );
        });
  	},  	
  	create: function(new_client, update){
		event.preventDefault();
		update = update || false;

		$.ajax({
		  type: 'POST',
		  url: "/api/clients",
		  data: new_client,
		  error: function(e) {
		    var response = jQuery.parseJSON(e.responseText);
		  	$('.new-client .status-msg').text("")
		  								.removeClass('success-msg')
		  								.addClass("error-msg")
		  								.text(response.message);			    
		  	return false;
		  },

		  success: function(result){			  		  	
		  	$('.new-client .status-msg').text("")
		  								.removeClass('remove-msg')		  								
		  								.addClass("success-msg")
		  								.text(result.message);
						
			if (update == true){
		  		client.clients.push(result.data);
				Vue.nextTick(function () {
					megaMenuInit();
				})		  		
		  	}		    
		  	
		  	new_client.name = null;
		  	new_client.phone_number = null;
		  	new_client.point_of_contact = null;
		  	new_client.email = null;
            $('.popup-form.new-client').find('input[type=text],textarea,select').filter(':visible:first').focus();
          }
		}); 
  	},
  	createProject: function(update){
		event.preventDefault();
		update = update || false;

		 $.ajax({
		   type: 'POST',
		   url: "/api/projects",
		   data: client.newProject,
		   error: function(e) {
		        var response = jQuery.parseJSON(e.responseText);
                $('.new-project .status-msg').text("")
		   								.removeClass('success-msg')
		   								.addClass("error-msg")
		   								.text(response.message);
		   	return false;
		   },

		    success: function(result){
		   	$('.new-project .status-msg').text("")
		   								.removeClass('remove-msg')
		   								.addClass("success-msg")
		   								.text(result.message);

            // TODO: insert the new client into the client array
		 	if (update == true){
                client.clients[client.tempClientIndex].projects.push(result.data);
		 		Vue.nextTick(function () {
		 			megaMenuInit();
		 		})
		   	}
            client.newProject.name = null;
            client.newProject.project_id = null;
            client.tempClientIndex = null;
            $('.popup-form.new-project').find('input[type=text],textarea,select').filter(':visible:first').focus();

            }
		 });
  	}
  }

});