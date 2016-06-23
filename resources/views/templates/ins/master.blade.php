@include('partials/head')

<div class="side-nav">
	@include('partials/nav')			
	@include('partials/footer')
</div>

<div class="content-area">
	@yield('content')
</div>

