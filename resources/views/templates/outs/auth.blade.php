@include('partials/head')

<style>
    body{
        background: url("{{ asset('assets/img/galactic_star_background.png') }}") no-repeat;
        background-size: cover;
    }
</style>
{{-- HEADER --}}

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @yield('content')
        </div>
    </div>
</div>



{{-- FOOTER --}}