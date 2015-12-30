var client = new Vue({
  el: '#client',
  data: {
    client: { name : null, phone_number : null, point_of_contact : null, email : null},
    clients: [],
    newProject: {name: null, project_id: null},
    lastRequest: false,
  },


  ready: function(){
  	this.getClients();
  },

  methods: {
  	getClients: function(){
		$.ajax({
		  type: 'GET',
		  url: "/api/clients",
		  
		  error: function(e) {
		  	return false;
		  },
		  success: function(results){
			client.clients = results.data;		  	  	
			Vue.nextTick(function () {
				megaMenuInit();
			})
		  }

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
		 	//if (update == true){
		   	//	client.clients.push(result.data);
		 	//	Vue.nextTick(function () {
		 	//		megaMenuInit();
		 	//	})
		   	//}

		   }
		 });
  	}
  },

})