var userObj = new Vue({
    el: '#user',
    data: {
        user: {},
        delete_text: null,
        msg: {error: null, success: null},
    },

    ready: function(){
        this.getUser();
    },

    methods: {
        getUser: function(){
            $.get( window.baseurl + "/api/user", function( result ) {
                userObj.user = result;
            });
        },
        update: function(event){
            if(event !== undefined) {
                event.preventDefault();
            }

            var data = this.user;

            $.ajax({
                type: "POST",
                url: window.baseurl + "/api/user/"+data.id,
                data: data,
                success: function(result){
                    if(result.message != "Your changes have been saved"){
                        userObj.msg.error = result.message;
                        userObj.msg.success = null;
                        return false;
                    }
                    userObj.msg.success = result.message;
                    userObj.msg.error = null
                },
                error: function(e){
                    // do nothing
                }
            });
        },
        delete: function(){
            showSheet();
            makePrompt("Are you sure you want to delete your account","This action is irreversible","No now", "Yes");

            $("#cancel-btn").click(function(){
                closePrompt();
            });

            $("#confirm-btn").click(function(){
                $.ajax({
                    type: "DELETE",
                    url: window.baseurl + "/api/user/",
                    success: function(result){
                        document.location.href="/";
                    },
                    error: function(e){
                        closePrompt();
                    }
                });
            });
        }
    }

});