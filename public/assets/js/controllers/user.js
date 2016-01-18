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
                //Vue.nextTick(function () {
                //    megaMenuInit();
                //});
            });
        },
        update: function(user){
            console.log("Update client");
        },
        delete: function(){
            console.log("The delete the logged in user");
        }
    }

});