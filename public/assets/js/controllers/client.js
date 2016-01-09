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
        $.get( "/api/clients/true", function( results ) {
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
	startClientEditMode: function(clientIndex){
        $(".client-info-"+clientIndex).hide();
        $(".client-update-form-"+clientIndex).show();
        $(".client-update-form-"+clientIndex).find('input[type=text],textarea,select').filter(':visible:first').focus();
    },
    updateClient: function(clientIndex){
        var data = this.clients[clientIndex];
        var id = data.id;
        data._method = "put";

        $.ajax({
            type: "POST",
            url: "/api/clients/"+id,
            data: data,
            success: function(){
                $(".client-update-form-"+clientIndex).hide();
                $(".client-info-"+clientIndex).show();
            },
            error: function(e){
                var response = jQuery.parseJSON(e.responseText);
                $('.client-update-form-'+clientIndex+ " .error-msg").text(response.message);
            }
        });
    },
    deleteClient: function(currentClient, clientIndex){
        showSheet();
        makePrompt(
            "Are you sure you want to delete the client: "+currentClient.name+"?",
            "By deleting this client you will loose all data associated with any project under this client",
            "No now", "Yes");

        $("#cancel-btn").click(function(){
            closePrompt();
        });

        $("#confirm-btn").click(function(){
            console.log(client);
            console.log(clientIndex);
            $.ajax({
                type: "POST",
                url: "/api/clients/"+currentClient.id,
                data: {_method: "delete"},
                success: function(){
                    client.clients.splice(clientIndex);
                    closePrompt();
                },
                error: function(e){
                    closePrompt();
                }
            });
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