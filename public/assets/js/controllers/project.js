var project = new Vue({
    el: '#project',
    data: {
        project: { name : null, weight : null, production : null, stage : null, github: null},
        newProject: {name: null, project_id: null},
        newTask: {name: null, weight: null, state: null, priority: null, description: null},
        currentTask: {name: null, weight: null, state: null, priority: null, description: null},
        newCredential: {type: null, name: null, hostname: null, username: null, password: null, port: null},
        currentCredential: {type: null, name: null, hostname: null, username: null, password: null, port: null}
    },
    ready: function(){
        this.setupProject();
    },
    computed: {
        projectWeight: function(){
            var tasks = this.project.tasks;
            var remainingWeight = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state != "complete" ){
                    remainingWeight = remainingWeight + Number(tasks[i].weight);
                }
            }

            return remainingWeight;
        },
        numTasks: function(){
            var tasks = this.project.tasks;
            var finalNum = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state != "backlog" ){
                    finalNum++;
                }
            }

            return finalNum;
        },
        numProgressTasks: function(){
            var tasks = this.project.tasks;
            var finalNum = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state == "progress" ){
                    finalNum++;
                }
            }

            return finalNum;
        },
        numTestingTasks: function(){
            var tasks = this.project.tasks;
            var finalNum = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state == "testing" ){
                    finalNum++;
                }
            }

            return finalNum;
        },
        numCompleteTasks: function(){
            var tasks = this.project.tasks;
            var finalNum = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state == "complete" ){
                    finalNum++;
                }
            }

            return finalNum;
        },
        numBacklogTasks: function(){
            var tasks = this.project.tasks;
            var finalNum = 0;

            for (var i = 0; i < tasks.length; i++){
                if( tasks[i].state == "backlog" ){
                    finalNum++;
                }
            }

            return finalNum;
        },
        numCredentials: function(){
            return this.project.credentials.length;
        }
    },
    methods: {
        setupProject: function(){
            var url = window.location.href,
                project_id  = url.split('projects/')[1];

            $.get( "/api/projects/"+project_id, function( results ) {
                project.project = results.data;
                Vue.nextTick(function () {
                    megaMenuInit();
                })
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        startProjectEditMode: function(){
            //$(".client-info-"+clientIndex).hide();
            //$(".client-update-form-"+clientIndex).show();
            //$(".client-update-form-"+clientIndex).find('input[type=text],textarea,select').filter(':visible:first').focus();
        },
        updateProject: function(){
            //var data = this.clients[clientIndex];
            //var id = data.id;
            //data._method = "put";
            //
            //$.ajax({
            //    type: "POST",
            //    url: "/api/clients/"+id,
            //    data: data,
            //    success: function(){
            //        $(".client-update-form-"+clientIndex).hide();
            //        $(".client-info-"+clientIndex).show();
            //    },
            //    error: function(e){
            //        var response = jQuery.parseJSON(e.responseText);
            //        $('.client-update-form-'+clientIndex+ " .error-msg").text(response.message);
            //    }
            //});
        },
        deleteTask: function(taskId){
            showSheet();
            makePrompt("Are you sure you want to delete this task?","","No now", "Yes");

            $("#cancel-btn").click(function(){
                closePrompt();
            });

            $("#confirm-btn").click(function(){
                $.ajax({
                    type: "POST",
                    url: "/api/tasks/"+taskId,
                    data: {_method: "delete"},
                    success: function(){
                        $(".task-"+taskId).hide();
                        closePrompt();
                    },
                    error: function(e){
                        closePrompt();
                    }
                });
            });
        },
        showTaskCreateForm: function(){
            $(".popup-form.new-task").show();
        },
        createTask: function(client_id, project_id){
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: "/api/tasks/"+ client_id +"/"+ project_id,
                data: project.newTask,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);
                    $('.new-task .status-msg').text("")
                        .removeClass('success-msg')
                        .addClass("error-msg")
                        .text(response.message);
                    return false;
                },

                success: function(result){

                    $('.new-task .status-msg').text("")
                        .removeClass('remove-msg')
                        .addClass("success-msg")
                        .text(result.message);

                    project.project.tasks.push(result.data);
                    Vue.nextTick(function () {
                        megaMenuInit();
                    });

                    project.newTask.name = null;
                    project.newTask.description = null;

                    $('.popup-form.new-task select option:first-child').attr("selected", "selected");
                    $('.popup-form.new-task').find('input[type=text],textarea,select').filter(':visible:first').focus();
                }
            });
        },
        editMode: function(task){
            this.currentTask = task;
            $(".popup-form.update-task").show();
        },
        updateTask: function(taskId){
            event.preventDefault();
            this.currentTask._method = "put";

            $.ajax({
                type: 'POST',
                url: "/api/tasks/"+ taskId,
                data: project.currentTask,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);
                    $('.update-task .status-msg').text("")
                        .removeClass('success-msg')
                        .addClass("error-msg")
                        .text(response.message);
                    return false;
                },
                success: function(result){
                    $('.update-task .status-msg').text("")
                        .removeClass('remove-msg')
                        .addClass("success-msg")
                        .text(result.message);
                }
            });
        },
        createCredential: function(user_id, project_id){
            event.preventDefault();

            var data = this.newCredential;
            data.user_id = user_id;
            data.project_id = project_id;

            $.ajax({
                type: 'POST',
                url: "/api/credentials",
                data: data,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);
                    $('.new-credential .status-msg').text("")
                        .removeClass('success-msg')
                        .addClass("error-msg")
                        .text(response.message);
                    return false;
                },
                success: function(result){
                    $('.new-credential .status-msg').text("")
                        .removeClass('remove-msg')
                        .addClass("success-msg")
                        .text(result.message);

                    project.project.credentials.push(result.data);

                    project.newCredential.name = null;
                    project.newCredential.hostname = null;
                    project.newCredential.password = null;
                    project.newCredential.port = null;
                }
            });
        },
    }

});