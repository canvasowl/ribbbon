<?php # /app/views/clients/show.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">        
            
            <div>
                <h2 class="pull-left no-margin-top">{{ $client->name }}</h2>                                   
                <ul class="list-inline pull-right">
                    <li><a class="btn btn-default" href="/clients/{{ $client->id }}/edit">Edit</a></li>
                </ul>
                <div class="clearfix"></div>   
                <hr>                 
            </div>
                    
            <section class="info">
                <h4>Contact</h4>
                <ul class="list-style-none">
                    <li><strong>Point of contact:</strong> {{ $client->point_of_contact }}</li>
                    <li><strong>Phone number:</strong> {{ $client->phone_number}}</li>
                    <li><strong>Email:</strong> {{ $client->email }}</li>
                </ul>                
            </section>
            <hr>
            <section class="info">
                <h4 class="app-wrapper-title">Projects</h4>
                <ul class="list-style-none">
                    <li><a href="/projects/id">Project name</a></li>
                    <li><a href="/projects/id">Project name</a></li>
                    <li><a href="/projects/id">Project name</a></li>
                    <li><a class="done" href="/projects/id">Project name</a></li>
                    <li><a class="done" href="/projects/id">Project name</a></li>
                </ul>
            </section>

		</div>
	</div>
</div>

@stop()


