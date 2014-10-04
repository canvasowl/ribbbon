@include('templates/partials/head')

<div class="hug hug-homeHeader">
	
	@include('templates/partials/unauth_nav')

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

</div>

<div class="hug hug-homeBody">
	<div class="container">
		@yield('content')
	</div>	
</div>

@include('templates/partials/footer')
