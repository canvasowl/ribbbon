@include('templates/partials/head')

@include('templates/partials/nav')

<div class="hug hug-homeBody">
	<div class="container">
		@yield('content')
	</div>	
</div>

@include('templates/partials/footer')
