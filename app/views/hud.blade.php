@extends('templates.hud_master')


@section('content')

<div class="row main-row">

	<div class="col-xs-12"><h2>Hud</h2></div>
	
	<div class="col-xs-12 col-md-8">

		<!-- Latest Tasks -->
		<div class="app-wrapper">                   				  	
			<h3>Latest Tasks</h3>
		  	@if (count($latestTasks) > 0)
			  	@foreach ($latestTasks as $task)
			  		<p>
			  			<a href="/projects/{{ $task->project_id }}">{{ $task->name }}</a> 
			  			<span class="badge badge-weight pull-right">{{ $task->weight}}</span><br>
			  			<span class="dimmed no-margin-left pull">{{ $task->updated_at->toFormattedDateString() }} <i class="fa fa-clock-o"></i></span>
			  		</p>
			  	@endforeach			  			  	
			@else
			    <section class="info">
					<i class="fa fa-lightbulb-o"></i>
					Once you start creating tasks for projects, your latest ones will show up here.
			    </section>
		  	@endif			
		</div>

		<!-- My projects -->
		<div class="app-wrapper">                   				  	
			<h3>Latest Projects</h3>
		  	@if ( count($latestProjects) > 0)
			  	@foreach ($latestProjects as $project)
			  		<p>
						<a href="/projects/{{ $project->id }}">{{ $project->name }}</a><br>
			  			<span class="dimmed no-margin-left">{{ $project->updated_at->toFormattedDateString() }} <i class="fa fa-clock-o"></i></span>
			  		</p>				  		
			  	@endforeach			  			  	
			@else
			    <section class="info">
					<i class="fa fa-lightbulb-o"></i>
					Your latest projects will show up here, you will need to create <a href="/clients">clients</a> in order to create projects.
			    </section>
		  	@endif			
		</div>

		<!-- Projects shared with me -->
		<div class="app-wrapper">                   				  	
			<h3>Projects Shared with me</h3>
			@if ( count($inProjects) > 0)
				@foreach ($inProjects as $project)
					<p>
						<a href="/projects/{{ $project->id }}">{{ $project->name }}</a><br>
						<span class="dimmed no-margin-left">{{ $project->updated_at->toFormattedDateString() }} <i class="fa fa-clock-o"></i></span>
					</p>
				@endforeach
			@else
			    <section class="info">
                    <i class="fa fa-lightbulb-o"></i>
					No projects have been shared with you. In order to become a
					member of a project a <i><b>project owner</b></i> has to send you an invite.
			    </section>
			@endif			
		</div>				
	</div>
	<!-- end of col 8 -->

	<div class="col-xs-12 col-md-4">
		<div class="app-wrapper sidebar">
			<center><p class="dimmed">Tasks</p></center>
			<div id="canvas-holder">
				<canvas id="chart-area" width="200" height="200"/>
			</div>	

			<div class="legend">
				<p><span class="complete"></span> complete</p>
				<p><span class="incomplete"></span> incomplete</p>
			</div>		
		</div>
	</div>

</div>


@stop()
