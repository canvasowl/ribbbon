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
				<a href="/register" class="btn btn-primary">Sign me up.</a>
			</div>
		</div>

	</div>		
</div>


@stop