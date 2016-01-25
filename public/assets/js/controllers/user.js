var userObj = new Vue({
    el: '#user',
    data: {
        user: {},
        delete_text: null
    },

    ready: function(){
        this.getUser();
    },

    methods: {
        getUser: function(){
            $.get( "/api/user/", function( result ) {
                userObj.user = result;
            });
        },
        update: function(){
            event.preventDefault();
            var data = this.user;

            $.ajax({
                type: "POST",
                url: "/api/user/"+data.id,
                data: data,
                success: function(result){
                    if(result.message != "Your changes have been saved"){
                        $("#error").text(result.message);
                        return false;
                    }
                    $("#error").text("");
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
                    url: "/api/user/",
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