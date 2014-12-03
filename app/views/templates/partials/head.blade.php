<!DOCTYPE html>
<html>
<head>
	<title>{{ $pTitle }}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">


	@if ( Request::is('/') && !Auth::check() )
		<style type="text/css">
			html { 
			  background: url(/assets/img/big_bg.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			}
			
			.hug-footerOut{position: absolute; z-index: 100; bottom: 0; left: 0; }

			body,html{font-size: 16px}
			
			.hug-homeBody .container{height: 0;}

			@media (max-width: 767px){
				html,
				.hug-homeBody .container{background: #69b4b8;}				
				.hug-footerOut{position: absolute;}
			}
		</style>
	@endif

	@if ( !Auth::check() && Request::is('/') || Request::is('beta') || Request::is('register') || Request::is('signin') || Request::is('about') || Request::is('faq') )
		<style type="text/css">
			.row{width: 900px; max-width: 100%; margin: 0 auto;}		
		</style>
	@endif	

	@if ( Request::is('about') || Request::is('faq')  )
		<style type="text/css">
			.container{padding-left: 0; padding-right: 0;}		
		</style>
	@endif	

	@if ( Request::is('beta') || Request::is('register') || Request::is('signin') )
		<style type="text/css">
			.hug-homeBody .container{height: auto;}
		</style>		
	@endif

	@if ( Request::is('about') )
		<style type="text/css">
			.container{width: 100%;}
		</style>		
	@endif	

	@if ( Auth::check() )
		<style type="text/css">
			.hug-homeHeader .auth-header .row{width: 100% !important} 
		</style>		
	@endif

</head>
<body>
@include('analyticstracking')

<div id="module">
	<a id="close" onclick="closeModule()" title="Close">X</a>
</div>

