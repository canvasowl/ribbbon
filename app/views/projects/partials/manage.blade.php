<section>
    <hr>
    <strong>Note:</strong>
    <p class="dimmed">Deleting <i>{{ $project->name }}</i> will delete all tasks associated with this project.</p>
    {{ Form::open(array('action' => 'ProjectsController@destroy', 'method' => 'delete')) }}
        <input type="hidden" name="id" value="{{ $project->id }}">
        <input type="submit" class="btn btn-danger" value="Delete Project" />  
    {{ Form::close() }}
</section>