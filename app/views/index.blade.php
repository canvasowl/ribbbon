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
</style>
	
<div class="row">
	<div class="col-xs-12">
		
		<div class="homepage-msg animated bounceInUp">
			<h1>Introducing Ribbbon</h1>
			<h4>A project management system for artisans.</h4>
			<div class="clearfix">
				<a href="/learn" class="btn btn-rival btn-cta">Learn More <i class="fa fa-lightbulb-o"></i></a>
				<a href="/register" class="btn btn-holo btn-cta">Sign me up <i class="fa fa-check-circle-o"></i></a>
			</div>
		</div>

	</div>		
</div>


@stop