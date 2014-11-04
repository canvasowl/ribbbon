@extends('templates.master')


@section('content')

	
  <div class="tab-pane active home-form" id="login">
  	<center><h1>Login</h1></center>
	<div>	
		{{ Form::open(array('action' => 'UsersController@login')) }}
			<div class="form-group">
				{{ Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "email","autofocus" => "true" )) }}	
			</div>
			<div class="form-group">
				{{ Form::password( 'password', array('class' => 'form-control', "placeholder" => "placeholder" )) }}	
			</div>
			<div class="form-group">
				{{ Form::submit( 'Login', array('class' => 'btn btn-rival pull-right')) }}
			</div>	    			
		{{ Form::close() }}
	</div>		  	
  </div>


@stop