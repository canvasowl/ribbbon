
{{--PROJECT INVITE FORM--}}
<div class="col-xs-12 col-md-12">
	<div class="dynamic-form">
		<div class="panel panel-holo">
			<div class="panel-heading"><strong>Manage Project Members</strong></div>
			<div class="panel-body">

				{{--members--}}
				<ul class="inline-list list-style-none members-list">
					<li><a title="{{ Auth::user()->full_name }}" class="profile-link" href="/profile"><img class="circle" src="{{ User::get_gravatar(Auth::user()->email) }}"></a></li>
					@foreach($members as $member)
						<li><img class="circle" title="{{ $member->full_name }}" src="{{ User::get_gravatar($member->email)  }}"></li>
					@endforeach
				</ul>
				<div class="clearfix"></div>

				{{--invite form--}}
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

</div>
<div class="clearfix"></div>

{{-- EDIT PROJECT FORM --}}
<div class="col-xs-12">
	<div class="dynamic-form">
		<div class="panel panel-holo">
		  <div class="panel-heading"><strong>Project information</strong></div>
			<hr>
			<div class="panel-body">
				<div class="form-w-label">
					{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}
						<div class="col-xs-2"><label>Name</label></div>
						<div class="col-xs-10">{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}</div>

						<div class="col-xs-2"><label>Github</label></div>
						<div class="col-xs-10">{{ Form::text('github', null, array('class' => 'form-control', 'placeholder' => 'https://github.com/canvasowl/hex'))}}</div>

						<div class="col-xs-2"><label>Production</label></div>
						<div class="col-xs-10">{{ Form::text('production', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

						<div class="col-xs-2"><label>Staging</label></div>
						<div class="col-xs-10">{{ Form::text('stage', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

						<div class="col-xs-2"><label>Development</label></div>
						<div class="col-xs-10">{{ Form::text('dev', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

						<div class="col-xs-2"></div>
						<div class="col-xs-10"><br>{{ Form::submit('Save', array('class' => 'btn btn-default pull-right' )); }}</div>
					{{ Form::close() }}
				</div>
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