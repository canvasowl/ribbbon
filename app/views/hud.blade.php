@extends('templates/hud_master')


@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="app-wrapper">
				<div class="row animated fadeIn">
					<div class="col-xs-4">						
						<a href="/clients" class="card">
							<img src="{{ asset('assets/img/heart.png') }}">
							<center>Clients</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/projects" class="card">
							<img src="{{ asset('assets/img/shield.png') }}">
							<center>Projects</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/tasks" class="card">
							<img src="{{ asset('assets/img/clipboard.png') }}">
							<center>Tasks</center>
						</a>
					</div>

					<div class="col-xs-4">
						<a href="#" class="card">
							<img src="{{ asset('assets/img/calendar.png') }}">
							<center>Calendar</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/#" class="card">
							<img src="{{ asset('assets/img/user.png') }}">
							<center>Invite</center>
						</a>
					</div>
					<div class="col-xs-4">
						<a href="/clients" class="card">
							<img src="{{ asset('assets/img/gear.png') }}">
							<center>Account Settings</center>
						</a>
					</div>
				</div>
			</div>
		</div>	
	</div>

@stop()