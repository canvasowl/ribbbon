		<!-- Remaining tasks -->
		<section class="info">
			@if ($taskCount == 0)
				<p>This project does not contain any remaining tasks.</p>
			@else
				<ul class="list-group">
					@foreach ($tasks as $task)
						<li class="list-group-item">

							<span class="pull-right">
							{{ Form::open(array('action' => 'TasksController@destroy', 'method' => 'delete')) }}
							<input type="hidden" name="id" value="{{ $task->id }}">
							<button title="delete" type="submit" class="btn-trash"><i class="fa fa-trash"></i></button>
							{{ Form::close() }}
							</span>

							<span class="badge badge-weight">{{ $task->weight }}</span>

							{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
								<input type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}" />
								{{ $task->name }}
								<input type="hidden" name="task" value="{{ $task->id }}">
							{{ Form::close() }}

						</li>
					@endforeach
				</ul>
			@endif
		</section>

	  	<hr>

	  	<!-- Completed tasks -->
		@if ($completedCount == 0)
			<p>No tasks has been completed for this project.</p>
		@else
			<ul class="list-group">
			 @foreach ($completedTasks as $task)
				 <li class="list-group-item">

					<span class="pull-right">
						{{ Form::open(array('action' => 'TasksController@destroy', 'method' => 'delete')) }}
							<input type="hidden" name="id" value="{{ $task->id }}">
							<button title="delete" type="submit" class="btn-trash"><i class="fa fa-trash"></i></button>
						{{ Form::close() }}
					</span>

					 <span class="badge badge-weight">{{ $task->weight }}</span>

					{{ Form::open(array('action' => 'TasksController@update', 'method' => 'put')) }}
						<input checked="checked" type="checkbox" onClick="this.form.submit()" name="task" value="{{ $task->id }}" />
						{{ $task->name }}
						<input type="hidden" name="task" value="{{ $task->id }}">
					{{ Form::close() }}

				 </li>
				@endforeach
			</ul>
		@endif