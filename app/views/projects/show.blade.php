<?php # /app/views/projects/show.blade.php  ?>
@extends('templates/hud_wide_master')

@section('content')


<div class="row main-row">

	<!-- ACTIONS -->
	<div class="col-xs-12">
        <h2>{{ $project->name }} <span class="total level animated tada">{{ $total_weight }}</span></h2>
        <ul class="list-inline pull-right">
        	<li><a title="Go back" class="btn " href="/clients/{{ $project->client_id}}"><i class="fa fa-arrow-circle-o-left fa-lg"></i></a></li>
            <li><a title="Edit project" class="btn" href="/projects/{{ $project->id }}/edit"><i class="fa fa-pencil-square-o fa-lg"></i></a></li>                   
        </ul>
	</div>

	<div class="col-xs-12 col-md-8">
		<div class="app-wrapper">                   				  	
		  	<!-- info pills -->
		  	<ul class="list-inline">
		  		@if ($project->production)
		  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->production }}">Production</a></li>
		  		@endif
		  		@if ($project->stage)
		  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->stage }}">Staging</a></li>
		  		@endif
		  		@if ($project->dev)
		  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->dev }}">Development</a></li>
		  		@endif
		  		@if ($project->github)
		  			<li><a class="pill pill-dark" target="_blank" href="{{ $project->github }}">Github</a></li>
		  		@endif
		  	</ul><br>
		  	<!-- info pills -->

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#tasks" role="tab" data-toggle="tab"><i class="fa fa-tasks"></i> Tasks</a></li>
			  <li><a href="#credentials" role="tab" data-toggle="tab"><i class="fa fa-key"></i> Credentials</a></li>
			  <li><a href="#manage" role="tab" data-toggle="tab"><i class="fa fa-cog"></i> Manage</a></li>
			</ul>			  	

			<!-- Tab panes -->
			<div class="tab-content">					  
			  
			  <!-- REMAINING TASKS -->
			  <div class="tab-pane active" id="tasks">					  	
				@include('projects/partials/tasks')	
			  </div>					  
			  
			  <!-- CREDENTIALS -->
			  <div class="tab-pane" id="credentials">
			  	@include('projects/partials/credentials')
			  </div>

			  <!-- MANAGE -->
			  <div class="tab-pane" id="manage">
			  	@include('projects/partials/manage')
			  </div>					  
			</div>
		</div>
	</div>
	<!-- end of col 8 -->

	<div class="col-xs-12 col-md-4">
		<div class="app-wrapper">
            <!-- SIDEBAR -->
				@include('projects.partials.sidebar')	
            <!-- SIDEBAR -->
		</div>
	</div>

</div>
<!-- end of main row -->
@stop()


