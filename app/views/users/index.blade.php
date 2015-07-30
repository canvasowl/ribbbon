<?php # /app/views/users/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<!-- MODULE -->
	<div class="module-form" id="delete-account-module">
		<head><h2>Delete Account?</h2></head>
		<div class="form-container">
			{{ Form::open(array('action' => 'UsersController@destroy', 'method' => 'delete')) }}
			<input type="hidden" name="id" value="{{ Auth::id() }}">
			<input type="submit" value="yes" class="btn btn-default">		
			{{ Form::close() }}					
			<button id="btn-no" class="btn btn-rival">Not yet</button></center>
		</div>			
	</div>
<!-- MODULE -->

<div class="row main-row">
	<div class="col-xs-12">
		<div class="app-wrapper profile-wrapper">

			<!-- Main user area -->
            <div class="main-user-wrap row">            		
            	<div class="col-xs-12 col-sm-12">            		
            		<center>
            			<img class="circle" src="{{ User::get_gravatar(Auth::user()->email, 200) }}">
            			<h3>{{ $user->full_name }}</h3>
            			<div class="dimmed">
            				<p>{{ Auth::user()->email }}</p>
            				<p>Profile picture managed by <a target="_blank" href="https://en.gravatar.com/">Gravatar</a></p>
            			</div>
            		</center>
            	</div>            	
            </div> 

            <!-- Stats -->
            <br>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Stats</h3>
			  </div>
			  <div class="panel-body">
			    <div class="col-xs-12 col-sm-6 stat-card">
			    	<center><h3>Tasks Created</h3></center>
			    	<center><span class="badge">{{ $created }}</span></center>
			    </div>
			    <div class="col-xs-12 col-sm-6 stat-card">
			    	<center><h3>Tasks Completed</h3></center>
			    	<center><span class="badge">{{ $completed }}</span></center>
			    </div>
			  </div>
			</div>

            <!-- Stats -->
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Settings</h3>
			  </div>
			  <div class="panel-body">
			  	<div class="col-sm-5 no-padding-left">
			  		<br><br>
			  		<p class="dimmed">To update your password type your current password, then your new password below.</p>			  		
			  	</div>
			  	<div class="col-xs-12 col-sm-7 no-padding-right">
			    	<p>Change Password</p>
					{{ Form::open(array('action' => array('UsersController@resetPassword', Auth::id() ))) }}
						<div class="form-group">
							{{ Form::password( 'current_pwd', array('class' => 'form-control', "placeholder" => "Current Password" )) }}
						</div>
						<div class="form-group">
							{{ Form::password( 'new_pwd', array('class' => 'form-control', "placeholder" => "New Password" )) }}	
						</div>
						<div class="form-group">
							{{ Form::submit( 'Update Password', array('class' => 'btn btn-primary pull-right')) }}
							<div class="clearfix"></div>
						</div>	    			
					{{ Form::close() }}	
			  	</div>	    		
		    	<hr>
		    	<div class="col-xs-12 no-padding-left">
			    	<p>Delete account</p>
			    	<p class="dimmed">Deleting your account will delete <b>ALL</b>, clients, projects and tasks created under this account</p>	    	
			    	<button id="delete-account" class="btn btn-danger">Delete my account</button>
		    	</div>
			  </div>
			</div> 			            		
          
        </div>
	</div>
</div>

@stop()


