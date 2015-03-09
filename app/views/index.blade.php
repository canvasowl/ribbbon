@extends('templates.master')


@section('content')

<div class="container container-index">

{{-- featured --}}
<div class="hug hug-h-featured">
	<div class="row">
	    <div class="col col-sm-12">
	        <h2 class="animated zoomInDown">So what's <span class="site-name">Ribbbon</span>?</h2>
	        <p class="animated zoomInDown">Ribbbon is web based project management system for web artisans. It helps you
	        manage your projects and more importantly yourself and others.</p>

            <div class="scroll-box">
                <div class="diamond">
                    <i class="fa fa-angle-double-down fa-5x"></i>
                </div>
                <p>scroll down</p>
            </div>
	    </div>
	</div>
</div>

{{-- weight --}}
<div class="hug hug-h-weight">
	<div class="row">
	    <div class="col col-sm-6">
	        <img src="https://api.fnkr.net/testimg/500x500/00CED1/FFF/?text=img+placeholder">
	    </div>
	    <div class="col col-sm-6">
	        <h2>Weight</h2>
	        <p>Keep track on how your project is doing with weights. Each task has
	        a weight which in turn helps create an overall project weight.</p>
	    </div>
	</div>
</div>

{{-- sharing --}}
<div class="hug hug-h-sharing">
	<div class="row">
	    <div class="col col-sm-12">
	        <h2>Sharing</h2>
	        Work on projects with others easily by sharing your project to
            one or multiple users.
	    </div>
	</div>
</div>

{{-- credentials --}}
<div class="hug hug-h-credentials">
	<div class="row">
	    <div class="col col-sm-12">
	        <h2>Credentials</h2>
	        <p>A Ribbbon project has a special place for all your various project credentials.
	        Finding that Wordpress username & password has never been easier.</p>

            <ul class="list-inline">
                <li><i class="fa fa-github fa-2x"></i></li>
                <li><i class="fa fa-wordpress fa-2x"></i></li>
                <li><i class="fa fa-facebook-square fa-2x"></i></li>
                <li><i class="fa fa-android fa-2x"></i></li>
                <li><i class="fa fa-database fa-2x"></i></li>
            </ul>
	    </div>
	</div>
</div>

{{-- files --}}
<div class="hug hug-h-sharing">
	<div class="row">
	    <div class="col col-sm-6">
	        <h2>Files</h2>
	        <p>Upload files per project, .pdf, .doc, .psd, .ai and many more file types supported.</p>
	    </div>
	    <div class="col col-sm-6">
	        <img src="https://api.fnkr.net/testimg/500x500/00CED1/FFF/?text=img+placeholder">
	    </div>
	</div>
</div>

{{-- signup --}}
<div class="hug hug-h-register">
	<div class="row">
	    <div class="col col-sm-6">
	        <img src="https://api.fnkr.net/testimg/500x500/00CED1/FFF/?text=img+placeholder">
	    </div>
	    <div class="col col-sm-6">
	        <h2>Register For Free</h2>
	        <p>Ribbbon is free so why not take it for spin and start managing your projects more organized.</p>
	    </div>
	</div>
</div>

</div>


@stop