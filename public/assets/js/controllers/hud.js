var hud = new Vue({
    el: '#hud',
    data: {
        clients: 0,
        projects: [],
        sharedProjects: [],
        tasks: 0
    },
    ready: function () {
        this.getClients();
        this.getProjects();
        this.getSharedProjects();
        this.getTasks();
    },
    computed: {},
    methods: {
        getClients: function(){
            $.get( "/api/clients/true", function( results ) {
                hud.clients = results.data.length;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getProjects: function(){
            $.get( "/api/projects", function( results ) {
                hud.projects = results.data;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getSharedProjects: function(){
            $.get( "/api/projects/shared", function( results ) {
                hud.sharedProjects = results.data;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getTasks: function(){
            $.get( "/api/tasks", function( results ) {
                hud.tasks = results.data.length;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
    }
});

