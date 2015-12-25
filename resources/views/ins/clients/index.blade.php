@extends('templates/ins/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Clients</h1>
			<a onClick="showForm('.popup-form.new-client')" href="" class="btn btn-primary pull-right" title="Create new client">+ New Client</a>			
			<a onClick="showForm('.popup-form.new-project')" href="" class="btn btn-default pull-right" title="Create new project">New Project</a>			
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">			
			
			<div class="mega-menu">			
				<div class="links">
					<a data-id="client_1" href="">Client 1</a>
					<a data-id="client_2" href="">Client 2</a>
				</div>

				<div class="content">
					<div class="item" id="client_1">CLIENT 1</div>
					<div class="item" id="client_2">CLIENT 2</div>
				</div>
			</div>

		</div>
	</div>

	<div id="client" class="popup-form new-client">
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
				<input v-model="client.name" placeholder="Client Name" type="text" class="form-control">
				<input v-model="client.email" placeholder="Email" type="text" class="form-control">
				<input v-model="client.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
				<input v-model="client.phone_number" placeholder="Contact Number" type="text"class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(client)" href="" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
	<script src="{{ asset('assets/js/controllers/client.js') }}"></script>
@stop()