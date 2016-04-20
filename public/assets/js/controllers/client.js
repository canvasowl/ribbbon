var client = new Vue({
  el: '#client',
  data: {
    clients: [],
    client: null,
    currentClient: null,
    newProjectClientId: {name: null, project_id: null},
    newProject: {name: null, project_id: null},
    tempClientIndex: null,
    lastRequest: false,
    msg: {success: null, error: null}
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
                result.data.projects = [];
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
        this.msg.success = null;
        this.msg.error = null;
        this.currentClient = this.clients[clientIndex];
        this.currentClient.position = clientIndex;

        $(".popup-form.update-client").show();
        $(".popup-form.update-client").find('input[type=text],textarea,select').filter(':visible:first').focus();
    },
    updateClient: function(){
        event.preventDefault();
        var data = this.currentClient;
        var id = data.id;
        data._method = "put";

        $.ajax({
            type: "POST",
            url: "/api/clients/"+id,
            data: data,
            success: function(e){
                console.log(e);
                client.msg.success = e.message;
                client.msg.error = null;
            },
            error: function(e){
                console.log(e);
                var response = jQuery.parseJSON(e.responseText);
                client.msg.success = null;
                client.msg.error = response.message;
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
    showNewProjectForm: function(project_id){
        event.preventDefault();
        this.msg.success = null;
        this.msg.error = null;
        $(".popup-form.update-project").show();
        $(".popup-form.update-project .first").focus();

        this.newProject.project_id = project_id;
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
                result.data.weight = 0;
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