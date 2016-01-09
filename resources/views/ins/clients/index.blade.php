@extends('templates/ins/master')

@section('content')
	<div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Clients</h1>
			<a onClick="showForm('.popup-form.new-client')" href="" class="btn btn-primary pull-right" title="Create new client">+ New Client</a>						
			<div class="clearfix"></div>
		</div>
	</div>

<div id="client">
	<div class="row">
		<div class="col-xs-12">			
			
			<div class="mega-menu">			
				<div class="links">					
					<a v-for="client in clients" class="" data-id="client_@{{client.id}}" href="">
						@{{client.name}}
					</a>
				</div>
				<div class="content">
					<div v-for="client in clients" class="item" id="client_@{{client.id}}" title="Edit client">
						<header>
                            <div class="client-info-@{{$index}}">
                                <h2 class="pull-left">@{{client.name}}</h2>
							    <p class="pull-right"><i v-on:click="startClientEditMode($index)" class="ion-edit"></i></p>
							    <div class="clearfix"></div>
								<p>@{{client.point_of_contact}}</p>
								<p>@{{client.phone_number}}</p>
								<p><a href="mailto:@{{client.email}}">@{{client.email}}</a></p>
							</div>
							<div class="client-update-form client-update-form-@{{$index}}">
                                <span class="status-msg error-msg"></span>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <input v-model="client.name" placeholder="Client Name" type="text" class="form-control first">
                                        <input v-model="client.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <input v-model="client.phone_number" placeholder="Contact Number" type="text" class="form-control">
                                        <input v-model="client.email" placeholder="Email" type="text" class="form-control">
                                    </div>
                                </div>
                                <br><br>
								<button v-on:click="updateClient($index)" class="pull-right btn btn-default">Save Changes</button>
                                <div class="clearfix"></div>
							</div>
						</header>
						<template v-if="client.projects.length > 0">
							<div class="panel panel-default panel-list animated fadeIn">
								<div class="panel-heading">Projects</div>
								<div class="panel-body">
									<a v-for="project in client.projects" href="/projects/@{{ project.id }}">
										@{{ project.name }}
										<span class="weight pull-right">w.@{{ project.weight }}</span>
									</a>
								</div>
							</div>
						</template>
						<br>
						<span data-index="@{{ client.id }}" onClick="showForm('.popup-form.new-project',@{{ client.id }},@{{ $index }})" class="btn btn-default pull-right animated fadeIn" title="Create new project">New Project</span>
                        <div class="clearfix"></div>
                        <hr><br><br>
                        <span v-on:click="deleteClient(client, $index)" class="btn btn-danger">Delete @{{ client.name }}</span>
					</div>
				</div>
			</div>

		</div>
	</div>

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
				<span class="status-msg"></span>
				<input v-model="client.name" placeholder="Client Name" type="text" class="form-control first">
				<input v-model="client.email" placeholder="Email" type="text" class="form-control">
				<input v-model="client.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
				<input v-model="client.phone_number" placeholder="Contact Number" type="text"class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(client,true)" href="" class="btn btn-primary pull-right">Save</a>
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
				<span class="status-msg"></span>
				<input v-model="newProject.name" placeholder="Name" type="text" class="form-control first">
			</form>
		</section>
		<footer>
			<a v-on:click="createProject(true)" href="" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
</div>


	<script src="{{ asset('assets/js/controllers/client.js') }}"></script>
@stop()