@extends('templates/ins/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Clients</h1>
			<a onClick="showForm('.popup-form.new-client')" href="" class="btn btn-primary pull-right" title="Create new client">+ New Client</a>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">			
	
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