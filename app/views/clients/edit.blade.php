<?php # /app/views/clients/edit.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">        
            
            <div>
                <h2 class="no-margin-top">{{ $client->name }}</h2>                                                   
            </div>
            
            <section class="info">
	            {{ Form::model($client,array('route' => 'clients.update')) }}
	            	<h4>Basic information</h4>
	            	<div class="form-group">
	            		{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}	
	            	</div>

	            	<hr>
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