<?php # /app/views/clients/edit.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">        
            
            <div>
                <center><h2 class="no-margin-top app-wrapper-title">{{ $client->name }}</h2></center>                                                   
                <hr>
            </div>
            
            <h4>Information</h4>
            <section class="info">
	            {{ Form::model($client, array('method' => 'PATCH', 'route' => array('clients.update', $client->id))) }}	            	
	            	<div class="col-xs-6 no-side-padding small-padding-right">
		            	<div class="form-group">
		            		<label>Name</label>{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}	
		            	</div>	            		
	            	</div>
	            	<div class="col-xs-6 no-side-padding small-padding-left">
		            	<div class="form-group">
		            		<label>Point of contact</label>{{ Form::text('point_of_contact', null, array('class' => 'form-control', 'placeholder' => 'Point of contact'))}}	
		            	</div>	            		
	            	</div>	            	
	            	<hr>
	            	<div class="form-group">
	            		<div class="col-xs-6 no-side-padding small-padding-right">
			            	<div class="form-group">
			            		<label>Phone number</label>{{ Form::text('phone_number', null, array('class' => 'form-control', 'placeholder' => '1.555.555.555'))}}	
			            	</div>	            			
	            		</div>
	            		<div class="col-xs-6 no-side-padding small-padding-left">
			            	<div class="form-group">
			            		<label>Email</label>{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'clientemail@client.com'))}}	
			            	</div>	            			
	            		</div>	            								
	            	</div>
	            	<div class="form-group">
						{{ Form::submit('Save', array('class' => 'btn btn-default pull-right' )); }}	            								
	            	</div>	            	
	            	<div class="clearfix"></div>
	            {{ Form::close() }}	                        	
            </section>
			     
		</div>
	</div>
</div>

@stop()