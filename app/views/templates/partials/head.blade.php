<!DOCTYPE html>
<html>
<head>
	<title>Rainbow</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}"> -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

	@if ( Request::is('/') )
		<style type="text/css">
			html { 
			  background: url(/assets/img/big_bg.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			}			
		</style>
	@endif

	@if ( Request::is('/') || Request::is('learn') || Request::is('register') || Request::is('signin')  )
		<style type="text/css">
			.row{width: 900px; max-width: 100%; margin: 0 auto;}		
		</style>
	@endif	

</head>
<body>

<div id="module">
	<a id="close" onclick="closeModule()" title="Close">X</a>
</div>

