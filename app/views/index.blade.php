@extends('templates.master')

@section('content')

	<div class="col-xs-12">
		<div class="athenticate-form-wrap">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#home" role="tab" data-toggle="tab">Login</a></li>
		  <li><a href="#profile" role="tab" data-toggle="tab">Signup</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="home">login</div>
		  <div class="tab-pane" id="profile">signup</div>
		</div>	
			{{ Form::open(array('action' => 'UsersController@destroy')) }}
    			
			{{ Form::close() }}
		</div>
	</div>

@stop