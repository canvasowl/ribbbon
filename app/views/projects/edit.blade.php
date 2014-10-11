<?php # /app/views/projects/edit.blade.php  ?>

@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">        
            
            <div>
                <center><h2 class="no-margin-top app-wrapper-title">{{ $project->name }}</h2></center>                                                   
                <hr>
            </div>
            
            <h4>Information</h4>
            <section class="info">
	            {{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}	            	
	            	<div class="col-xs-12 no-side-padding small-padding-right">
		            	<div class="form-group">
		            		<label>Name</label>{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}	
		            	</div>	            		
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