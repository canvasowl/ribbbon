<?php # /app/views/projects/show.blade.php  ?>
@extends('templates/hud_wide_master')

@section('content')


<div class="row main-row">

	@include('projects.partials.actions')



	<div class="col-xs-12 col-md-8">
		<div class="app-wrapper">                   				  	
			@include('projects/partials/tasks')	
		</div>
	</div>
	<!-- end of col 8 -->

	<div class="col-xs-12 col-md-4">
		<div class="app-wrapper sidebar">
            <!-- SIDEBAR -->
				@include('projects.partials.sidebar')	
            <!-- SIDEBAR -->
		</div>
	</div>

</div>
<!-- end of main row -->
@stop()


