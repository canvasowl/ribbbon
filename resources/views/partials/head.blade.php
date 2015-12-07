<!DOCTYPE html>
<html>
<head>
	<title>{{ $pTitle }}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">	
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
@include('analyticstracking')

<!-- <div id="module">
	<a id="close" onclick="closeModule()" title="Close">X</a>
</div> -->

