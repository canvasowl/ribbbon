@extends('templates.master')

@section('content')

	<div class="col-xs-12">
		<div class="athenticate-form-wrap">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
		  <li><a href="#signup" role="tab" data-toggle="tab">Signup</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">

		 <div>
			@if (isset($errors))
				{{ $errors->first(); }}
			@endif		 	
		 </div>	

		  <div class="tab-pane active" id="login">
		   	<p>Login into your account</p>
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
		  <div class="tab-pane" id="signup">
		   	<p>Register</p>
			<div>										
				{{ Form::open(array('action' => 'UsersController@register')) }}
					<div class="form-group">
						<label for="fullName">Full Name</label>
						{{ Form::text('fullName', null, array('class' => 'form-control' )) }}	
					</div>				
					<div class="form-group">
						<label for="email">Email</label>
						{{ Form::text('email', null, array('class' => 'form-control' )) }}	
					</div>
	    			<div class="form-group">
	    				<label for="email">Password</label>
	    				{{ Form::password('password', array('class' => 'form-control' )) }}	
	    			</div>
	    			<div class="form-group">
	    				{{ Form::submit('Signup', array('class' => 'btn btn-default pull-right' )); }}
	    			</div>	    			
				{{ Form::close() }}
			</div>		  	
		  </div>

	</div>

@stop