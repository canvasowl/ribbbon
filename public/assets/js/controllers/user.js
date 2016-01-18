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
            console.log(data);
            //return false;

            $.ajax({
                type: "POST",
                url: "/api/user/"+data.id,
                data: data,
                success: function(result){
                    console.log(result);
                },
                error: function(e){
                    console.log(e);
                }
            });
        },
        delete: function(){
            console.log("The delete the logged in user");
        }
    }

});