var client = new Vue({
  el: '#client',
  data: {
    client: { name : null, phone_number : null, point_of_contact : null, email : null},
    clients: [],
    lastRequest: false,

  },


  compiled: function(){
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
  	create: function(client){
		event.preventDefault();

		$.ajax({
		  type: 'POST',
		  url: "/api/clients",
		  data: client,
		  error: function(e) {
		    var response = jQuery.parseJSON(e.responseText);
		  	$('.new-client .status-msg').text("")
		  								.removeClass('success-msg')
		  								.addClass("error-msg")
		  								.text(response.message);			    
		  	return false;
		  },
		  success: function(data){		  	
		  	$('.new-client .status-msg').text("")
		  								.removeClass('remove-msg')		  								
		  								.addClass("success-msg")
		  								.text(data.message);		    		  	
		  	
		  	client.name = null;
		  	client.phone_number = null;
		  	client.point_of_contact = null;
		  	client.email = null;
		  }
		}); 
  	}
  },

})