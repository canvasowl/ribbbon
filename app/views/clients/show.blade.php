<?php # /app/views/clients/show.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper app-wrapper-wide">        
            
             <div>
                <h2 class="pull-left no-margin-top">{{ $client->name }}</h2>                                   
                <ul class="list-inline pull-right">
                    <li><a class="btn btn-default" href="/clients/{{ $client->id }}/edit">Edit</a></li>
                </ul>
                <div class="clearfix"></div>   
                <hr>                 
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-8 no-padding-left">
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
                        {{ Form::open(array('action' => 'ClientsController@destroy', 'method' => 'delete')) }}
                            <input type="hidden" name="id" value="{{ $client->id }}">
                            <input type="submit" class="btn btn-danger" value="Delete Client" />  
                        {{ Form::close() }}
                    </section>                
                </div>
                <div class="col-xs-12 col-sm-4 no-padding-right">
                    <div class="panel panel-default">
                      <div class="panel-heading">Create new project</div>
                      <div class="panel-body">                      
                        {{ Form::open( array('action' => 'ProjectsController@create', 'method' => 'get') )}}
                            <label>Project name:</label>                            
                            <input type="text" name="name" class="form-control">
                            <input type="hidden" name="client_id" value="{{ $client_id }}">    
                            <div class="clearfix"></div><br>                                                                                    
                            <input type="submit" class="btn btn-success btn-wide" value="create">    
                        {{ Form::close() }}
                      </div>
                    </div>                     
                </div>
            </div>
                    

		</div>
	</div>
</div>

@stop()


