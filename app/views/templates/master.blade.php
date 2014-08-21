@include('templates/partials/head')

<div class="hug hug-homeHeader">
	<div class="row">
		<div class="col-xs-12">
			<center><h1>Ribbbon</h1></center>
			<center><h3>The project management system of artisans</h3></center>		
			<hr>
		</div>
	</div>	
</div>

<div class="hug hug-homeBody">
	<div class="container">
		@yield('content')
	</div>	
</div>

@include('templates/partials/footer')
