<?php # /app/views/projects/show.blade.php  ?>
@extends('templates/hud_wide_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper app-wrapper-wide">        
            
            <div>
                <h2 class="pull-left no-margin-top">{{ $project->name }}</h2>                                   
                <ul class="list-inline pull-right">
                    <li><a class="btn btn-default" href="/projects/{{ $project->id }}/edit">Edit</a></li>
                </ul>
                <div class="clearfix"></div>   
                <hr>                 
            </div>

            <div class="row">            	            
	            <div class="col-xs-12 col-md-6">
	            	<p><strong>Recent Activity:</strong></p>
	            	<table class="table">
	            		<tr><td>New task: Create the landing page</td><td>Sep 12 1988</td></tr>
	            		<tr><td>New task: Create the landing page</td><td>Sep 12 1988</td></tr>
	            		<tr><td>New task: Create the landing page</td><td>Sep 12 1988</td></tr>
	            		<tr><td>New task: Create the landing page</td><td>Sep 12 1988</td></tr>
	            		<tr><td>New task: Create the landing page</td><td>Sep 12 1988</td></tr>
	            	</table>
	            </div>
	            <div class="col-xs-12 col-md-6">
		            <section class="info info-dark">
		            	<p>Project Progresss:</p>
			            <div class="progress">
						  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						    60%
						  </div>
						</div>            	
		            </section>            	
	            </div>
            </div>
			
			<!-- Nav tabs -->
			<ul class="nav nav-tabs margin-top" role="tablist">
			  <li class="active"><a href="#tasks" role="tab" data-toggle="tab">Tasks</a></li>
			  <li><a href="#manage" role="tab" data-toggle="tab">Manage</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane active" id="tasks">
			  	<section class="info">

			  		<div class="legend">
			  			<p>Task weights</p>
			  			<ul class="list-style-none">
			  				<li><span class="level level-hot"></span> hot</li>	
			  				<li><span class="level level-common"></span> common</li>
			  				<li><span class="level level-medium"></span> medium</li>
			  				<li><span class="level level-hard"></span> hard</li>
			  				<li><span class="level level-super"></span> super</li>
			  			</ul>
			  		</div>

			  		<table class="table">
			  			<thead>
			  				<tr><th></th><th>Task Name</th><th>Weight</th></tr>			  				
			  				<tbody>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-super"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-super"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-hot"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-common"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-common"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-medium"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-hard"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-common"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-medium"></span></td></tr>
			  					<tr><td><input type="checkbox" /></td><td>First Task</td><td><span class="level level-common"></span></td></tr>
			  				</tbody>
			  			</thead>
			  		</table>
			  	</section>
			  </div>
			  <div class="tab-pane" id="manage">three</div>
			</div>
                               

		</div>
	</div>
</div>

@stop()


