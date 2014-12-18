@extends('templates.master')

@section('content')

<!-- Intro -->
<div class="hug hug-about-intro">
	<div class="row">
		<div class="col-xs-12">
			<center><i class="fa fa-lightbulb-o fa-5x"></i></center>
			<center><h1>So what's <span class="site-name">Ribbbon</span>?</h1></center>
			<center>
				<p>Ribbbon is a project management system aimed to make you 
				<br>think less about the project management system 
				and more<br> about actually managing your project.</p>
			</center>
		</div>
	</div>		
</div>

<!-- UI -->
<div class="hug hug-about-ui">
	<div class="row">
		<center><i class="fa fa-adjust fa-5x"></i></center>
		<center><h2>A clean Ui.</h2></center>
		<div class="col-xs-12">
			<img src="{{ asset('assets/img/screen_ui.png') }}">
		</div>
		<div class="col-xs-12">						
			<center><p>Gone are the days were you have to think too much 
			in order to manage your projects. We like to keep things 
			clean around here so you can digest the information 
			fast and manage everything better.</p></center>
		</div>
	</div>		
</div>

<!-- Cerdentials -->
<div class="hug hug-about-shield">
	<div class="row">
		<div class="col-xs-12">
			<center><i class="fa fa-shield fa-5x"></i></center>
			<center><h2>Keep credentials in place.</h2></center>
			<center><img src="{{ asset('assets/img/credentials.png') }}"></center>
			<center>
				<p>Sometimes one project may have multiple servers, social accounts, 
				or any other type of modern online accounts, this makes for numerous 
				credentials needing to be remembered. Ribbbon helps you by having 
				one place where all of your credentials per project should live, period.</p>
			</center>
		</div>
	</div>		
</div>

<!-- CTA -->
<div class="hug hug-about-tasks">
	<div class="row">
		<div class="col-xs-12">
			<center><i class="fa fa-check-circle-o fa-5x"></i></center>
			<center><h2>Take it for a spin.</h2></center>
			<center>
				<p>Give Ribbbon a try today, it’s free. To get started just click on<br> the button below and start enjoying a
				better way to manage projects.</p>
				<center><a href="/beta" class="btn btn-primary btn-cta">Try Ribbbon</a></center>
			</center>
		</div>
	</div>		
</div>

@stop