@extends('templates.master')


@section('content')

	
  <div class="tab-pane active home-form" id="login">
  	<center><h1>Register For Free!</h1></center>
	<div>										
		{{ Form::open(array('action' => 'UsersController@register')) }}
			<div class="form-group">				
				{{ Form::text('fullName', null, array('class' => 'form-control', "placeholder" => "full name", "autofocus" => "true" )) }}	
			</div>				
			<div class="form-group">
				{{ Form::text('email', null, array('class' => 'form-control', "placeholder" => "email" )) }}	
			</div>
			<div class="form-group">
				{{ Form::password('password', array('class' => 'form-control', "placeholder" => "password" )) }}	
			</div>
			<div class="form-group">
				{{ Form::submit('Signup', array('class' => 'btn btn-primary btn-wide' )); }}
			</div>	    			
		{{ Form::close() }}
	</div>		  	
  </div>


@stop