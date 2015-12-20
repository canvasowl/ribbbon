var client = new Vue({
  el: '#client',
  data: {
    client: { name : null, phone_number : null, point_of_contact : null, email : null},
    lastRequest: false,

  },

  methods: {
  	create: function(client){
		event.preventDefault();

		$.ajax({
		  type: 'POST',
		  url: "/api/clients",
		  data: client,
		  error: function(e) {
		    var response = jQuery.parseJSON(e.responseText);
		  	$('.new-client .status-msg').text("")
		  								.addClass("error-msg")
		  								.text(response.message);			    
		  	return false;
		  },
		  success: function(data){		  	
		  	$('.new-client .status-msg').text("")
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