@extends('templates/ins/master')

@section('content')
	<div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml"
		 xmlns:v-on="http://www.w3.org/1999/xhtml">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Hud</h1>
			<a onClick="showForm('.popup-form.new-client')" href="" class="btn btn-primary pull-right" title="Create new client">+ New Client</a>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="row">
		{{-- latest section  --}}
		<div class="col-xs-12 col-md-8">
			{{-- projects --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Latest Projects</div>
			  <div class="panel-body">
			  	@if (count($latestProjects) > 0)
					<?php $pCounter = 1; ?>
				  	@foreach ($latestProjects as $project)
				  		<a class="with-number" href="/projects/{{ $project->id }}">
				  			<span class="dim">{{ $pCounter }}.</span> {{ $project->name }}
				  			<span class="weight pull-right">w.{{ $project->totalWeight() }}</span>
				  		</a>
						<?php $pCounter++; ?>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<i class="fa fa-lightbulb-o"></i>
						Your latest projects will show up here, you will need to create <a href="/clients">clients</a> in order to create projects.
				    </section>
			  	@endif
			  </div>
			</div>			

			{{-- tasks --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Latest Tasks</div>
			  <div class="panel-body">
			  	@if (count($latestTasks) > 0)
					<?php $tCounter = 1; ?>
				  	@foreach ($latestTasks as $task)
				  		<a class="with-number" href="/projects/{{ $task->project_id }}">
							<span class=dim>{{ $tCounter }}.</span> {{ $task->name }}
				  			<span class="weight pull-right">w.{{ $task->weight}}</span>
				  		</a>
						<?php $tCounter++ ?>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<i class="fa fa-lightbulb-o"></i>
						Once you start creating tasks for projects, your latest ones will show up here.
				    </section>
			  	@endif
			  </div>
			</div>

			{{-- shared projects --}}
			@if (count($inProjects) > 0)
				<div class="panel panel-default panel-list">
				  <div class="panel-heading">Shared Projects</div>
				  <div class="panel-body">
					   <?php $sCounter = 1; ?>
					  	@foreach ($inProjects as $project)
					  		<a class="with-number" href="/projects/{{ $project->id }}">
					  			<span class="dim">{{ $sCounter }}</span> {{ $project->name }}
					  			<span class="weight pull-right">w.{{ $project->totalWeight() }}</span>
					  		</a>
							<?php $sCounter++ ?>
					  	@endforeach			  			  	
				  </div>
				</div>
			@endif		

		</div>

		{{-- latest completed tasks --}}
		<div class="col-xs-12 col-md-4">
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Last Completed Tasks</div>
			  <div class="panel-body">
			  	@if (count($latestCompletedTasks) > 0)
					<?php $ltCounter = 1;?>
				  	@foreach ($latestCompletedTasks as $task)
				  		<a class="with-number" href="/projects/{{ $task->project_id }}">
				  			<span class="dim">{{ $ltCounter }}</span>. {{ $task->name }}
				  			<span class="weight pull-right">w.{{ $task->weight }}</span>
				  		</a>
				  	@endforeach
					<?php $ltCounter++ ?>
			  	@else
		  			<center><p>You haven't comepleted any task in a while!</p></center>								  		
			  	@endif		  			  	
			  </div>
			</div>			
		</div>

	</div>

	<div id="client" class="popup-form new-client">
		<header>
			<p class="pull-left">New Client</p>
			<div class="actions pull-right">
				<i title="Minimze " class="ion-minus-round"></i>
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