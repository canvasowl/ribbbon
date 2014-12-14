		<!-- Remaining tasks -->
	  	<section class="info">
	  		@if ($taskCount == 0)
	  			<p>This project does not contain any remaining tasks.</p>
	  		@else
		  		<table class="table">
		  			<thead>
		  				<tr><th>Name</th><th>Weight</th><th>Actions</th></tr>			  				
		  				<tbody>
		  					@foreach ($tasks as $task)					  					
		  					<tr>
		  						<td>					  							
		  							{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
		  								<input type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}" />  			
			  							{{ $task->name }}
			  							<input type="hidden" name="task" value="{{ $task->id }}">
		  							{{ Form::close() }}
		  						</td>
		  						<td><span class="level">{{ $task->weight }}</span></td>
		  						<td>
		  							<ul class="list-style-none inline-list">
		  								<li>
			  								{{ Form::open(array('action' => 'TasksController@destroy', 'method' => 'delete')) }}
			  								<input type="hidden" name="id" value="{{ $task->id }}">
			  								<button title="delete" type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
		  									{{ Form::close() }}					  									
		  								</li>
		  							</ul>						  							
		  						</td>
		  					</tr>
		  					@endforeach				  		
		  				</tbody>
		  			</thead>
		  		</table>
	  		@endif
	  	</section>

	  	<hr>

	  	<!-- Completed tasks -->
	  	<section class="info">
	  		@if ($completedCount == 0)
	  			<p>No tasks has been completed for this project.</p>
	  		@else
		  		<table class="table">
		  			<thead>
		  				<tr><th>Name</th><th>Weight</th><th>Actions</th></tr>			  				
		  				<tbody>
		  					@foreach ($completedTasks as $task)				  					
		  					<tr>
		  						<td>					  							
		  							{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
		  								<input checked="checked" type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}" /> 
			  							{{ $task->name }}
			  							<input type="hidden" name="task" value="{{ $task->id }}">
		  							{{ Form::close() }}
		  						</td>
		  						<td><span class="level">{{ $task->weight }}</span></td>
		  						<td>
		  							<ul class="list-style-none inline-list">
		  								<li>
			  								{{ Form::open(array('action' => 'TasksController@destroy', 'method' => 'delete')) }}
			  								<input type="hidden" name="id" value="{{ $task->id }}">
			  								<button title="delete" type="submit" class="btn btn-default"><i class="fa fa-trash"></i></button>
		  									{{ Form::close() }}					  							
		  								</li>
		  							</ul>						  							
		  						</td>					  						
		  					</tr>
		  					@endforeach				  		
		  				</tbody>
		  			</thead>
		  		</table>
	  		@endif
	  	</section>