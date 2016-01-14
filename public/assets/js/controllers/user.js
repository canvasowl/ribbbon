var userObj = new Vue({
    el: '#user',
    data: {
        user: {full_name: null}
    },

    ready: function(){
        this.getUser();
    },

    methods: {
        getUser: function(){
            $.get( "/api/user/", function( results ) {
                userObj.user = results.data[0];
                Vue.nextTick(function () {
                    megaMenuInit();
                });
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