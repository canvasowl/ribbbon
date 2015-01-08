{{--PROJECT INVITE FORM--}}
<div id="manage" class="dynamic-form">
		<div><strong>Manage Project Members</strong></div><br>
		<div>
			{{--members--}}
			<ul class="inline-list list-style-none members-list">
				<li><img class="circle" src="{{ User::get_gravatar(User::find($project->user_id)->email) }}"></li>
				@foreach($members as $member)
					<li>
						<img class="circle" title="{{ $member->full_name }}" src="{{ User::get_gravatar($member->email)  }}">
						{{ Form::open(array('action' => array('ProjectsController@remove', $project->id), 'method' => 'delete' ) ) }}
							<input type="hidden" name="member_id" value="{{ $member->id }}">
							<button title="remove {{ $member->full_name }}" id="{{ $member->id }}" type="submit" class="btn-trash"><i class="fa fa-trash"></i></button>
						{{ Form::close() }}
					</li>
				@endforeach
			</ul>
			<div class="clearfix"></div>			
			{{--invite form--}}
			<div id="project-invite-form">
			{{ Form::open(array('method' => 'POST', 'route' => array('projects.invite', $project->id))) }}
				<br><div class="msg"><span class="error"></span><span class="success"></span></div>
				<div class="form-group">
					{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email'))}}
				</div>
				<div class="form-group">
					{{ Form::submit('Invite', array('id'=> $project->id ,'class' => 'btn btn-default pull-right' )); }}
				</div>
			{{ Form::close() }}
			</div>
		</div>
	<div class="clearfix"></div>
</div>



{{-- EDIT PROJECT FORM --}}
<hr>
<div class="">
	<div class=""><strong>Project information</strong></div><br>
	<div class="">
		<div class="dynamic-form">
			<div class="form-w-label">
				{{ Form::model($project, array('method' => 'PATCH', 'route' => array('projects.update', $project->id))) }}
					<div class="col-xs-2 no-padding-left"><label>Name</label></div>
					<div class="col-xs-10 no-padding-right">{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name'))}}</div>

					<div class="col-xs-2 no-padding-left"><label>Github</label></div>
					<div class="col-xs-10 no-padding-right">{{ Form::text('github', null, array('class' => 'form-control', 'placeholder' => 'https://github.com/canvasowl/hex'))}}</div>

					<div class="col-xs-2 no-padding-left"><label>Production</label></div>
					<div class="col-xs-10 no-padding-right">{{ Form::text('production', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

					<div class="col-xs-2 no-padding-left"><label>Staging</label></div>
					<div class="col-xs-10 no-padding-right">{{ Form::text('stage', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

					<div class="col-xs-2 no-padding-left"><label>Development</label></div>
					<div class="col-xs-10 no-padding-right">{{ Form::text('dev', null, array('class' => 'form-control', 'placeholder' => 'http://www.example.com'))}}</div>

					<div class="col-xs-2 no-padding-left"></div>
					<div class="col-xs-10 no-padding-right"><br>{{ Form::submit('Save', array('class' => 'btn btn-default pull-right' )); }}</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

</div>

{{--DELETE PROJECT FORM--}}
<hr>
<div class="">
	<div class="">
	  <div class=""><strong>Delete Project</strong></div>
		<div class="">
		    <p class="dimmed">Deleting <i>{{ $project->name }}</i> will delete all tasks associated with this project.</p>
		    {{ Form::open(array('action' => 'ProjectsController@destroy', 'method' => 'delete')) }}
		        <input type="hidden" name="id" value="{{ $project->id }}">
		        <input type="submit" class="btn btn-danger" value="Delete Project" />  
		    {{ Form::close() }}
		</div>
	</div>
</div>

