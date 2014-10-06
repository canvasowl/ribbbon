@extends('templates.master')


@section('content')

	
  <div class="tab-pane active" id="login">
	<div>	
		{{ Form::open(array('action' => 'UsersController@login')) }}
			<div class="form-group">
				<label for="email">Email</label>
				{{ Form::text( 'email', null, array('class' => 'form-control' )) }}	
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				{{ Form::password( 'password', array('class' => 'form-control' )) }}	
			</div>
			<div class="form-group">
				{{ Form::submit( 'Login', array('class' => 'btn btn-default pull-right ')) }}
			</div>	    			
		{{ Form::close() }}
	</div>		  	
  </div>


@stop