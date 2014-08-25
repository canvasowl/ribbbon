@include('templates/partials/head')

<div class="hug hug-homeHeader">

	@if ($errors->first())
		<div class="alert alert-danger alert-main animated fadeInDown" role="alert">
	  		<a href="#" class="alert-link">  			
	  			{{ $errors->first() }}  			
	  		</a>
		</div>
	@endif

	@if(Session::has('success'))
		<div class="alert alert-success alert-main animated fadeInDown" role="alert">
	  		<a href="#" class="alert-link">  			
	  			{{ Session::get('success') }}  			
	  		</a>
		</div>		
	@endif

	<div class="row">
		<div class="col-xs-12">
			<center><h1>Ribbbon</h1></center>
			<center><h3>The project management system of artisans</h3></center>		
		</div>
	</div>	

</div>

<div class="hug hug-homeBody">
	<div class="container">
		@yield('content')
	</div>	
</div>

@include('templates/partials/footer')
