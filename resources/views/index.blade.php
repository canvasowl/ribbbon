@extends('templates.outs.home')

@section('content')
    {{-- HEADER--}}
	<div class="hug hug-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/" class="pull-left"><img src="{{ \App\Helpers\Helpers::logoUrl() }}" alt="Ribbbon"></a>
                    <a href="/login" class="btn btn-primary btn-line pull-right login">Login</a>
                    <a href="/register" class="btn btn-primary btn-line pull-right register">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>

    {{-- HEREO SECTIO--}}
    <div class="hug hug-hero">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="left-side">
                        <h1>Introducing Ribbbon 2.0</h1>
                        <h2>An open source project management system.</h2>
                        <a href="/register" class="btn btn-special">GET STARTED</a>
                    </div>
                    <div class="right-side">
                        <img class="mascot" src="{{ asset('assets/img/mascot_left.png')  }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop