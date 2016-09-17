@extends('templates/ins/master')

@section('content')
    
<div id="client">
    <div class="row">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">Clients</h1>
            <a v-on:click="showCreateForm()" class="btn btn-primary pull-right" title="Create new client">+ New Client</a>
            <div class="clearfix"></div>
        </div>
    </div>

    <template v-if="clients.length != 0">
        <div class="row">
            <div class="col-xs-12">
                <div class="mega-menu">
                    <div class="links">
                        <a v-for="client in clients" data-id="client_@{{client.id}}" href="">
                            @{{client.name}}
                        </a>
                    </div>
                    <div class="content">
                        <div v-for="client in clients" class="item" id="client_@{{client.id}}" title="Edit client">
                            <header>
                                <div class="client client-info-@{{$index}} page-title-section">
                                    <h2 class="pull-left">@{{client.name}} <a v-on:click="startClientEditMode($index)" class="show-on-hover btn btn-default" title="Edit Client"><i class="ion-edit"></i></a></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <p><label>Contact name: </label> @{{client.point_of_contact}}</p>
                                    <p><label>Contact number: </label> @{{client.phone_number}}</p>
                                    <p><label>Contact email: </label> <a href="mailto:@{{client.email}}">@{{client.email}}</a></p>
                                </div>
                            </header>
                            <hr>
                            <span v-on:click="showNewProjectForm(client.id, $index)" title="Create new project" class="btn btn-default pull-right">New Project</span>
                            <template v-if="client.projects.length > 0">
                                <h4>Projects</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="project in client.projects">
                                        <td>@{{ $index + 1 }}</td>
                                        <td><a href="{{ route('projects.show', ['id' => '']) }}/@{{ project.id }}">@{{ project.name }}</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </template>
                            <br>
                            <div class="clearfix"></div>
                            <hr><br><br>
                            <span v-on:click="deleteClient(client, $index)" class="btn btn-danger pull-right">Delete @{{ client.name }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </template>

    <template v-if="clients.length == 0">
        <div class="clearfix"></div>
        <p class="alert alert-warning">
            Your clients will be listed here once you create some.
            Create a new client <a v-on:click="showCreateForm()">now</a>.
        </p>
    </template>

	{{-- FORMS --}}
	<div class="popup-form new-client">
		<header>
			<p class="pull-left">New Client</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
				<span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
				<span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="client.name" placeholder="Client Name" type="text" class="form-control first">
				<input v-model="client.email" placeholder="Email" type="text" class="form-control">
				<input v-model="client.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
				<input v-model="client.phone_number" placeholder="Contact Number" type="text"class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(client,true)" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
	<div class="popup-form new-project">
		<header>
			<p class="pull-left">New Project</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
                <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="newProject.name" placeholder="Name" type="text" class="form-control first">
			</form>
		</section>
		<footer>
			<a v-on:click="createProject(true)" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
	<div style="z-index: 20" class="popup-form update-client">
        <header>
            <p class="pull-left">Update Client</p>
            <div class="actions pull-right">
                <i title="Minimze "class="ion-minus-round"></i>
                <i title="Close" class="ion-close-round"></i>
            </div>
            <div class="clearfix"></div>
        </header>
        <section>
            <form>
                <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
                <span class="status-msg"></span>
                <input v-model="currentClient.name" placeholder="Client Name" type="text" class="form-control first">
                <input v-model="currentClient.email" placeholder="Email" type="text" class="form-control">
                <input v-model="currentClient.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
                <input v-model="currentClient.phone_number" placeholder="Contact Number" type="text"class="form-control">
            </form>
        </section>
        <footer>
            <a v-on:click="updateClient()" class="btn btn-primary pull-right">Update</a>
            <div class="clearfix"></div>
        </footer>
	</div>
</div>


	<script src="{{ asset('assets/js/controllers/client.js') }}"></script>
@stop()