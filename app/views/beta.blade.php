@extends('templates.master')

@section('content')
	
  <div class="tab-pane active home-form" id="login">
  	<center><h1>Request An Invite <i class="fa fa-envelope-o"></i></h1></center>
  	<center><p class="dimmed">Request an invite by submitting your email below.</p></center>
	<div>	
		{{ Form::open(array('action' => 'UsersController@request')) }}
			<div class="form-group">
				{{ Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "email","autofocus" => "true" )) }}	
			</div>
			<div class="form-group">
				{{ Form::submit( 'Send invite request', array('class' => 'btn btn-rival pull-right')) }}
			</div>	    			
		{{ Form::close() }}
	</div>		  	
  </div>

@stop