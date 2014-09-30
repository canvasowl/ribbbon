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
            
            <section class="info">
                <h4>Projects</h4>
                <ul class="list-style-none">
                    @foreach ($projects as $project)
                        <li><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li> 
                    @endforeach                    
                </ul>
            </section>
            <section>
                <hr>
                <strong>Note:</strong>
                <p>Deleting <i>{{ $client->name }}</i> will delete all projects and tasks associated with this client.</p>
                {{ Form::open() }}
                    <input type="submit" class="btn btn-danger" value="Delete {{ $client->name }}" />  
                {{ Form::close()}}
            </section>
		</div>
	</div>
</div>

@stop()


