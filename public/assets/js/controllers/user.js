var userObj = new Vue({
    el: '#user',
    data: {
        user: {}
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
            console.log("The delete the logged in user");
        }
    }

});