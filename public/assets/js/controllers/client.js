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
        $.get( window.baseurl + "/api/clients/true", function( results ) {
            client.clients = results.data;
            Vue.nextTick(function () {
                megaMenuInit();
            })
        }).fail(function(e){
            console.log( e );
        });
  	},
    showCreateForm: function(){
          this.msg.success = null;
          this.msg.error = null;
          $(".new-client").show();
          $(".new-client .first").focus();
      },
  	create: function(new_client, update){

		update = update || false;

		$.ajax({
		  type: 'POST',
		  url: window.baseurl + "/api/clients",
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

        var data = this.currentClient;
        var id = data.id;
        data._method = "put";

        $.ajax({
            type: "POST",
            url: window.baseurl + "/api/clients/"+id,
            data: data,
            success: function(e){
                console.log(e);
                client.msg.success = e.message;
                client.msg.error = null;
            },
            error: function(e){
                var response = jQuery.parseJSON(e.responseText);
                client.msg.success = null;
                client.msg.error = response.message;
            }
        });
    },
    deleteClient: function(currentClient, clientIndex){
        this.currentClient = currentClient;

        showSheet();
        makePrompt(
            "Are you sure you want to delete the client: "+currentClient.name+"?",
            "By deleting this client you will loose all data associated with any project under this client",
            "Not now", "Yes");

        $("#cancel-btn").click(function(){
            closePrompt();
        });

        $("#confirm-btn").click(function(){
            $.ajax({
                type: "POST",
                url: window.baseurl + "/api/clients/"+currentClient.id,
                data: {_method: "delete"},
                success: function(){
                    client.clients.splice(clientIndex);
                    client.currentClient = null;

                    $(".mega-menu .links a").removeClass("active").addClass("inactive");
                    $(".mega-menu .links a:first-child").removeClass("inactive").addClass("active");
                    $(".mega-menu .content .item").hide();
                    var id = "#" + $(".mega-menu .content div:first-child").show();

                    closePrompt();
                },
                error: function(){
                    client.currentClient = null;
                    closePrompt();
                }
            });
        });
    },
    showNewProjectForm: function(clientId, clientIndex){

        this.msg.success = null;
        this.msg.error = null;
        this.newProject.client_id = clientId;
        this.tempClientIndex = clientIndex;

        $(".popup-form.new-project").show();
        $(".popup-form.new-project .first").focus();
    },
  	createProject: function(){

		 $.ajax({
		   type: 'POST',
		   url: window.baseurl + "/api/projects",
		   data: client.newProject,
		   error: function(e) {
               var response = jQuery.parseJSON(e.responseText);
               client.msg.success = null;
               client.msg.error = response.message;
		   },
		    success: function(result){
                console.log(client.clients);
                console.log(result);
                client.clients[client.tempClientIndex].projects.push(result.data);
                client.msg.success = result.message;
                client.msg.error = null;

                client.newProject.name = null;
                client.newProject.project_id = null;
                $('.popup-form.new-project').find('input[type=text],textarea,select').filter(':visible:first').focus();
            }
		 });
  	}
  }

});