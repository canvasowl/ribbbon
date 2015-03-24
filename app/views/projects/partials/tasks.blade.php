<!-- new task form -->
<div><strong>Create new task</strong></div><br>
<div>					    
<i class="dimmed">For the weight, enter a number from 1-5, the higher the number the harder the task.</i>
<div class="form-group">
	<form action="/tasks/create" method="get">
		<div class="row">		            				
			<div class="col-xs-11 no-padding-left">
    			<input placeholder="Name" type="text" name="name" class="form-control" value="{{ Input::old('name') }}" autofocus>		            				
			</div>
			<div class="col-xs-1 no-padding-right no-padding-left">
				<div>
					<input placeholder="1-5" type="text" name="weight" class="form-control" value="{{ Input::old('weight') }}">
				</div>
			</div>
			<div class="col-xs-12 no-margin-left no-padding-right no-padding-left">
			    <br>
                <div class="form-group">
                    <input type="hidden" name="projectId" value="{{ $project->id }}">
                    <button class="btn btn-primary btn-wide"><i class="fa fa-list-ol fa-lg"></i></button>
                </div>
			</div>
		</div>
	</form>
</div>
</div>
<div class="clearfix"></div><br>

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
    <section class="info">
        <p>No tasks has been completed for this project.</p>
    </section>
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