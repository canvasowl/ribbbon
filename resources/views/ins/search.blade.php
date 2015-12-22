@extends('templates/ins/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Search</h1>
		</div>
		<div class="col-xs-12">
			<h4>
			<strong class="color-primary">
				{{ count($clients) + count($projects) + count($tasks) }}
			</strong>Results for: "<strong class="color-primary"><i>{{ $q }}</i></strong>"</h4>			
		</div>
	</div>

	<div class="row">

		<div class="col-xs-12">
			{{-- clients --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Clients ({{count($clients)}})</div>
			  <div class="panel-body">
			  	@if (count($clients) > 0)
				  	@foreach ($clients as $client)
				  		<a href="/clients/{{ $client->id }}">
				  			{{ $client->name }} 
				  		</a>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<p class="dimmed">Sorry I couldn't find nothing....</p>	
				    </section>
			  	@endif
			  </div>
			</div>			

			{{-- projects --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Projects ({{count($projects)}})</div>
			  <div class="panel-body">
			  	@if (count($projects) > 0)
				  	@foreach ($projects as $project)
				  		<a href="/projects/{{ $project->id }}">
				  			{{ $project->name }} 
				  			<span class="weight pull-right">w.{{ $project->weight}}</span>
				  		</a>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<p class="dimmed">Sorry I couldn't find nothing....</p>	
				    </section>
			  	@endif
			  </div>
			</div>

			{{-- tasks --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Tasks ({{count($tasks)}})</div>
			  <div class="panel-body">
			  	@if (count($tasks) > 0)
				  	@foreach ($tasks as $task)
				  		<a href="/projects/{{ $task->project_id }}">
				  			{{ $task->name }} 
				  			<span class="weight pull-right">w.{{ $task->weight}}</span>
				  		</a>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<i class="fa fa-lightbulb-o"></i>
						Once you start creating tasks for projects, your latest ones will show up here.
				    </section>
			  	@endif
			  </div>
			</div>			
	
		</div>
	</div>

@stop()