{{--<div class="alert alert-info" role="alert">Manage your project settings here</div>--}}

{{--PROJECT INVITE FORM--}}
<div class="col-xs-12 col-md-6">
	<div class="dynamic-form">
		<div class="panel panel-default">
			<div class="panel-heading">Manage Project Members</div>
			<div class="panel-body">
				{{ Form::open(array('method' => 'POST', 'route' => array('projects.invite', $project->id))) }}
					<div class="form-group">
						{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email'))}}
					</div>
					<div class="form-group">
						{{ Form::submit('Invite', array('class' => 'btn btn-default pull-right' )); }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>

{{--PROJECT MEMBERS--}}
<div class="col-xs-12 col-md-6">
	<ul class="inline-list list-style-none">
		<li><a title="{{ Auth::user()->full_name }}" class="profile-link" href="/profile"><img class="circle" src="{{ User::get_gravatar(Auth::user()->email) }}"></a></li>
	</ul>
</div>
<div class="clearfix"></div>
{{-- EDIT PROJECT FORM --}}
<div class="col-xs-12">
	<div class="dynamic-form">
		<div class="panel panel-default">
		  <div class="panel-heading">Project information</div>
			<div class="panel-body">
				{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}
					<div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label>Name</label>{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label>Github</label>{{ Form::text('github', null, array('class' => 'form-control', 'placeholder' => 'https://github.com/canvasowl/hex'))}}
						</div>
					</div>

					<div class="col-xs-12 col-md-4">
						<label>Production</label>{{ Form::text('production', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}
					</div>
					<div class="col-xs-12 col-md-4">
						<label>Staging</label>{{ Form::text('stage', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}
					</div>
					<div class="col-xs-12 col-md-4">
						<label>Development</label>{{ Form::text('dev', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}
					</div>
					<div class="col-xs-12">
						<br>
						<div class="form-group">
							{{ Form::submit('Save', array('class' => 'btn btn-default pull-right' )); }}
						</div>
					</div>
					<div class="clearfix"></div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
{{--DELETE PROJECT FORM--}}
<div class="col-xs-12">
    <hr>
    <strong>Note:</strong>
    <p class="dimmed">Deleting <i>{{ $project->name }}</i> will delete all tasks associated with this project.</p>
    {{ Form::open(array('action' => 'ProjectsController@destroy', 'method' => 'delete')) }}
        <input type="hidden" name="id" value="{{ $project->id }}">
        <input type="submit" class="btn btn-danger" value="Delete Project" />  
    {{ Form::close() }}
</div>
<div class="clearfix"></div>