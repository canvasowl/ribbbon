var project = new Vue({
    el: '#project',
    data: {
        project: { id: null, name : null, weight : null, production : null, dev : null, github: null, description: null},
        newProject: {name: null, project_id: null},
        newTask: {name: null, weight: null, state: null, priority: null, description: null},
        currentTask: {name: null, weight: null, state: null, priority: null, description: null},
        newCredential: {type: null, name: null, hostname: null, username: null, password: null, port: null},
        currentCredential: {type: null, name: null, hostname: null, username: null, password: null, port: null},
        msg: {success: null, error: null},
        owner: {id: null},
        members: [],
        invited: {email: null}
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
        },
        projectProgress: function(){
            var tasks = this.project.tasks;
            var totalWeight = 0;
            var completedWeight = 0;

            for (var i = 0; i < tasks.length; i++){
                totalWeight = totalWeight + Number(tasks[i].weight);

                if( tasks[i].state == "complete" ){
                    completedWeight = completedWeight + Number(tasks[i].weight);
                }
            }
            return  (completedWeight / totalWeight) * 100;
        }
    },
    methods: {
        setupProject: function(){
            this.getOwner();
            this.getMembers();
            var url = window.location.href,
                project_id  = url.split('/').splice(-1);

            $.get( window.baseurl + "/api/projects/"+project_id, function( results ) {
                project.project = results.data;
                Vue.nextTick(function () {
                    megaMenuInit();
                })
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        startProjectEditMode: function(){
            this.msg.success = null;
            this.msg.error = null;
            $(".popup-form.update-project").show();
            $(".popup-form.update-project .first").focus();
        },
        updateProject: function(){

            var updatedProject = this.project;

            delete updatedProject.tasks;
            delete updatedProject.credentials;

            updatedProject._method = "put";

            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/projects/"+ updatedProject.id,
                data: updatedProject,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },
                success: function(result){
                    project.msg.success = result.message;
                    project.msg.error = null;
                }
            });
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
                    url: window.baseurl + "/api/tasks/"+taskId,
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
            this.msg.success = null;
            this.msg.error = null;
            $(".popup-form.new-task").show();
            $(".popup-form.new-task .first").focus();
        },
        createTask: function(client_id, project_id){


            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/tasks/"+ client_id +"/"+ project_id,
                data: project.newTask,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },

                success: function(result){
                    project.msg.success = result.message;
                    project.msg.error = null;

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
            this.msg.success = null;
            this.msg.error = null;
            this.currentTask = task;
            $(".popup-form.update-task").show();
            $(".popup-form.update-task .first").focus();
        },
        updateTask: function(taskId){


            this.currentTask._method = "put";

            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/tasks/"+ taskId,
                data: project.currentTask,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },
                success: function(result){
                    project.msg.success = result.message;
                    project.msg.error = null;
                }
            });
        },
        createCredential: function(user_id, project_id){


            var credential = this.newCredential;
            credential.user_id = user_id;
            credential.project_id = project_id;

            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/credentials",
                data: credential,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },
                success: function(result){
                    project.msg.success = result.message;
                    project.msg.error = null;

                    project.project.credentials.push(result.data);

                    project.newCredential.name = null;
                    project.newCredential.username = null;
                    project.newCredential.hostname = null;
                    project.newCredential.password = null;
                    project.newCredential.port = null;
                }
            });
        },
        deleteCredential: function(credential){
            showSheet();
            makePrompt("Are you sure you want to delete this credential?","","No now", "Yes");

            $("#cancel-btn").click(function(){
                closePrompt();
            });

            $("#confirm-btn").click(function(){
                $.ajax({
                    type: "POST",
                    url: window.baseurl + "/api/credentials/"+credential.id,
                    data: {_method: "delete"},
                    success: function(){
                        project.project.credentials.$remove(credential);
                        closePrompt();
                    },
                    error: function(e){
                        closePrompt();
                    }
                });
            });
        },
        editCredential: function(credential){
            this.msg.success = null;
            this.msg.error = null;
            this.currentCredential = credential ;
            $(".popup-form.update-credential").show();
            $(".popup-form.update-credential .first").focus();
        },
        updateCredential: function(credentialId){

            this.currentCredential._method = "put";

            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/credentials/"+ credentialId,
                data: project.currentCredential,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },
                success: function(result){
                    project.msg.success = result.message;
                    project.msg.error = null;
                }
            });
        },
        getOwner: function(){
            var url = window.location.href,
                project_id  = url.split('/').splice(-1);

            $.get( window.baseurl + "/api/projects/"+project_id+"/owner", function( results ) {
                project.owner = results.data;
                Vue.nextTick(function () {
                    megaMenuInit();
                })
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getMembers: function(){
            var url = window.location.href,
                project_id  = url.split('/').splice(-1);

            $.get( window.baseurl + "/api/projects/"+project_id+"/members", function( results ) {
                project.members = results.data;
                console.log(project.members);
                Vue.nextTick(function () {
                    megaMenuInit();
                })
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        inviteUser: function(project_id){
            if(this.invited.email == ""){
                this.invited.email = "";
            }

            $.ajax({
                type: 'POST',
                url: window.baseurl + "/api/projects/"+ project_id +"/"+this.invited.email+"/invite",
                data: project.currentCredential,
                error: function(e) {
                    var response = jQuery.parseJSON(e.responseText);

                    project.msg.success = null;
                    project.msg.error = response.message;

                    return false;
                },
                success: function(result){
                    project.members.push(result.data);
                    project.msg.success = result.message;
                    project.msg.error = null;
                }
            });
        },
        removeMember: function(project_id, member){
            showSheet();
            makePrompt("Are you sure you want to remove this member from this project?","","Not now", "Yes");

            $("#cancel-btn").click(function(){
                closePrompt();
            });

            $("#confirm-btn").click(function(){
                $.ajax({
                    type: "POST",
                    url: window.baseurl + "/api/projects/"+project_id+"/"+member.id+"/remove",
                    data: {_method: "delete"},
                    success: function(){
                        project.members.$remove(member);
                        closePrompt();
                    },
                    error: function(e){
                        closePrompt();
                    }
                });
            });
        }
    }

});