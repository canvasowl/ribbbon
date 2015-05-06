@extends('templates.hud_master')


@section('content')

<div class="row main-row">

    @if( Client::where('user_id', Auth::id())->count() === 0)
        <div class="col-xs-12"><center><a href="/clients" class="btn btn-primary"><i class="fa fa-plus"></i> CREATE FIRST CLIENT</a></center></div>
    @endif


	<div class="col-xs-12"><h2>Hud</h2></div>
	
	<div class="col-xs-12 col-md-8">

		<!-- Latest Tasks -->
		<div class="app-wrapper">                   				  	
			<h5>Latest Tasks</h5>
		  	@if (count($latestTasks) > 0)
			  	@foreach ($latestTasks as $task)
			  		<p>
			  			<a href="/projects/{{ $task->project_id }}">{{ $task->name }}</a> 
			  			<span class="badge badge-weight pull-right">{{ $task->weight}}</span>
			  			<span class="dimmed no-margin-left pull">{{ $task->updated_at->toFormattedDateString() }}</span>
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
			<h5>Latest Projects</h5>
		  	@if ( count($latestProjects) > 0)
			  	@foreach ($latestProjects as $project)
			  		<p>
						<a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
			  			<span class="dimmed no-margin-left">{{ $project->updated_at->toFormattedDateString() }}</span>
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
			<h5>Projects Shared with me</h5>
			@if ( count($inProjects) > 0)
				@foreach ($inProjects as $project)
					<p>
						<a href="/projects/{{ $project->id }}">{{ $project->name }}</a>
						<span class="dimmed no-margin-left">{{ $project->updated_at->toFormattedDateString() }}</span>
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
			<section class="info">
			@if(count($latestCompletedTasks) > 0)
			    <h3 class="no-margin-top">Latest completed tasks</h3>
                @foreach($latestCompletedTasks as $task)
                    <p><i class="fa fa-check"></i> <span class="line-through">{{ $task->name }}</span> <span class="dimmed">{{ $task->updated_at->toFormattedDateString() }}</span></p>
                @endforeach
            @else
                <p>You havent completed any tasks lately</p>
            @endif
            </section>
		</div>
	</div>

</div>


@stop()
