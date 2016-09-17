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
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.js"></script>
	<script src="{{ asset('assets/js/ui.js') }}"></script>
</head>
<body>
@include('analyticstracking')
<script>
	window.baseurl = '{{ route('home') }}'
</script>

<div id="sheet" class="animated"></div>
<div id="pop-up-prompt" class="animated">
	<header><h3 class="color-badge"></h3></header>
	<div>
		<p></p>
        <section>
            <span id="cancel-btn" class="btn"></span>
            <span id="confirm-btn" class="btn"></span>
        </section>
	</div>
</div>

