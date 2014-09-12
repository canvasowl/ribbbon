<?php # /app/views/projects/show.blade.php  ?>
@extends('templates/hud_wide_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper app-wrapper-wide">        
            
            <div>
                <h2 class="pull-left no-margin-top">{{ $project->name }}</h2>                                   
                <ul class="list-inline pull-right">
                    <li><a class="btn btn-default" href="/projects/{{ $project->id }}/edit">Edit</a></li>
                </ul>
                <div class="clearfix"></div>   
            </div>

            <div class="row">            	            
	            <div class="col-xs-12 col-md-6">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
					  <li class="active"><a href="#tasks" role="tab" data-toggle="tab">Remaining Tasks</a></li>
					  <li><a href="#manage" role="tab" data-toggle="tab">Completed Tasks</a></li>
					</ul>
			  		
			  		<div class="legend">
			  			<p>Task weights</p>
			  			<ul class="list-style-none">
			  				<li><span class="level level-easy"></span> easy</li>
			  				<li><span class="level level-medium"></span> medium</li>
			  				<li><span class="level level-hard"></span> hard</li>
			  			</ul>
			  		</div>

					<!-- Tab panes -->
					<div class="tab-content">
					  
					  <div class="tab-pane active" id="tasks">					  	
					  	<section class="info">
					  		@if ($taskCount == 0)
					  			<p>This project does not contain any remaining tasks.</p>
					  		@else
						  		<table class="table">
						  			<thead>
						  				<tr><th>Task</th><th>Weight</th></tr>			  				
						  				<tbody>
						  					@foreach ($tasks as $task)
				  							<?php
				  								if ($task->weight == 1) {
				  									$weight = "level-easy";
				  								}else if($task->weight == 2){
				  									$weight = "level-medium";
				  								}else if($task->weight == 3){
				  									$weight = "level-hard";
				  								}
				  							?>					  					
						  					<tr>
						  						<td>					  							
						  							{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
						  								<input type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}" /> 						  			
							  							{{ $task->name }}</td><td><span class="level {{ $weight }}"></span>
							  							<input type="hidden" name="task" value="{{ $task->id }}">
						  							{{ Form::close() }}
						  						</td>
						  					</tr>
						  					@endforeach				  		
						  				</tbody>
						  			</thead>
						  		</table>
					  		@endif

					  	</section>
					  </div>

					  <div class="tab-pane" id="manage">
					  	<section class="info">
					  		<table class="table">
					  			<thead>
					  				<tr><th>Task</th><th>Weight</th></tr>			  				
					  				<tbody>
					  					@foreach ($completedTasks as $task)
			  							<?php
			  								if ($task->weight == 1) {
			  									$weight = "level-easy";
			  								}else if($task->weight == 2){
			  									$weight = "level-medium";
			  								}else if($task->weight == 3){
			  									$weight = "level-hard";
			  								}
			  							?>					  					
					  					<tr>
					  						<td>
					  							{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
						  							<input checked="checked" type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}"/> 
						  							{{ $task->name }}</td><td><span class="level {{ $weight }}"></span>
						  							<input type="hidden" name="task" value="{{ $task->id }}">
					  							{{ Form::close() }}
					  						</td>
					  					</tr>
					  					@endforeach				  		
					  				</tbody>
					  			</thead>
					  		</table>
					  	</section>					  	
					  </div>

					</div>
	            </div>

	            <div class="col-xs-12 col-md-6">
		            <section>
		            	<p>Create a new task</p>
		            	<div class="form-group">
		            		{{ Form::open() }}	
		            			<label>Name</label>
		            			<input type="text" name="name" class="form-control">	
		            		{{ Form::close() }}
		            	</div>
		            	
		            </section>

		            <section class="info info-dark">
		            	<p>Project Progresss:</p>
			            <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						    60%
						  </div>
						</div>            	
		            </section>            	


	            </div>
            </div>
			                             
		</div>
	</div>
</div>

@stop()


