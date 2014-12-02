@extends('templates.master')


@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="app-wrapper">
				<div class="row animated fadeIn">
					<div class="col-xs-4">						
						<a href="/clients" class="card">
							<center><i class="fa fa-book fa-3x"></i></center>
							<center>Clients</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/projects" class="card">
							<center><i class="fa fa-hdd-o fa-3x"></i></center>
							<center>Projects</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/profile" class="card">
							<center><i class="fa fa-user fa-3x"></i></center>
							<center>Account</center>
						</a>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="row">
		<!-- Latest tasks -->
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-tasks">
			  <div class="panel-heading">
			    <h3 class="panel-title">Latest Tasks</h3>
			  </div>
			  <div class="panel-body">
			    <p><a href="">Lorem ipsum</a> <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			  </div>
			</div>			
		</div>
		<!-- Latest projects -->
		<div class="col-xs-12 col-md-6">
			<div class="panel panel-projects">
			  <div class="panel-heading">
			    <h3 class="panel-title">Latest Projects</h3>
			  </div>
			  <div class="panel-body">
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			    <p>Lorem ipsum <span class="level level-medium pull-right">1</span></p>
			  </div>
			</div>			
		</div>
	</div>

@stop()