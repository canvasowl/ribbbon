@include('templates/partials/head')

<div class="hug hug-homeHeader">
	<div class="row">
		<div class="col-xs-12">
			<h1>Rainbow</h1>		
		</div>
	</div>	
</div>

<div class="hug hug-homeBody">
	<div class="container">
		@yield('content')
	</div>	
</div>

@include('templates/partials/footer')
