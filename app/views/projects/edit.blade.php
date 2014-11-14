<?php # /app/views/projects/edit.blade.php  ?>

@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">        
            
            <div>
                <center><h2 class="no-margin-top app-wrapper-title">{{ $project->name }}</h2></center><hr>
            </div>
                                    
            {{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}	            	
            	<div class="col-xs-12 col-md-6">	            		
	            	<div class="form-group">
	            		<label>Name</label>{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}	
	            	</div>	            		
            	</div>

				<div class="col-xs-12 col-md-6">	            		
	            	<div class="form-group">
	            		<label>Github</label>{{ Form::text('github', null, array('class' => 'form-control', 'placeholder' => 'https://github.com/canvasowl/hex'))}}	
	            	</div>	            		
            	</div>            	

            	<div class="col-xs-12"><h3>Project url's</h3><hr></div>
            	
            	<div class="col-xs-12 col-md-4">
            		<label>Production</label>{{ Form::text('production', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}	
            	</div>
            	<div class="col-xs-12 col-md-4">
            		<label>Staging</label>{{ Form::text('stage', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}	
            	</div>
            	<div class="col-xs-12 col-md-4">
            		<label>Development</label>{{ Form::text('dev', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}	
            	</div>
            	<div class="col-xs-12">
            		<br>
	            	<div class="form-group">
						{{ Form::submit('Save', array('class' => 'btn btn-default pull-right' )); }}	         			
	            	</div>
	            </div>	            	
            	<div class="clearfix"></div>
            {{ Form::close() }}	                        	            
			     
		</div>
	</div>
</div>

@stop()