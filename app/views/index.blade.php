@extends('templates.master')


@section('content')

<style type="text/css">
	html { 
	  background: url(/assets/img/big_bg.jpg) no-repeat center center fixed; 
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	}

	.row{width: 900px; max-width: 100%; margin: 0 auto;}

	body,html{font-size: 16px}
</style>

<div class="container">
	<div class="row homepage-msg">
		<div class="col-xs-12 col-md-6">
			<h1>Ribbbon is<br>
			A project management system for artisans.</h1>
		</div>
		<div class=" col-xs-12 col-md-6 animated bounceInRight">
			<center><h2>Request A Beta Invitation</h2></center>	
			<center><a href="/beta" class="btn btn-rival btn-cta">Sign up for beta</a></center>			
		</div>			
	</div>	
</div>


@stop