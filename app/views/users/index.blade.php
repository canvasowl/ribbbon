<?php # /app/views/users/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">

			<!-- Main user area -->
            <div class="main-user-wrap row">
            	<div class="col-xs-12 col-sm-4">
            		<img class="circle" src="{{ asset('assets/img/guy.jpg') }}">
            	</div>
            	<div class="col-xs-12 col-sm-8">
            		<h1>{{ $user->full_name }}</h1>
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
		    	<p>Change Password</p>
		    	<hr>
		    	<p>Delete account</p>
		    	<p class="dimmed">Deleting yoru account will delete all, clients, projects and tasks created under this account</p>		    
			  </div>
			</div> 			            		
          
        </div>
	</div>
</div>

@stop()


