<?php # /app/views/clients/show.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row main-row">
    <div class="col-xs-12">
        <h2 class="pull-left">{{ $client->name }}</h2>
        <ul class="list-inline pull-right">
            <li><a title="Go back" class="btn " href="/clients"><i class="fa fa-arrow-circle-o-left fa-lg"></i></a></li>
            <li><a title="Edit client" class="btn " href="/clients/{{ $client->id }}/edit"><i class="fa fa-pencil-square-o fa-lg"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>


    {{-- CONTENT --}}
    <div class="col-xs-12 col-sm-8">
        <div class="app-wrapper">
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
            <p class="dimmed">Deleting <i>{{ $client->name }}</i> will delete all projects and tasks associated with this client.</p>
            {{ Form::open(array('action' => 'ClientsController@destroy', 'method' => 'delete')) }}
                <input type="hidden" name="id" value="{{ $client->id }}">
                <input type="submit" class="btn btn-danger" value="Delete Client" />
            {{ Form::close() }}
        </section>
        </div>
    </div>
    {{-- CONTENT --}}

    {{-- SIDEBAR --}}
    <div class="col-xs-12 col-sm-4">
        <div class="app-wrapper">
            <div class="panel">
              <div class="panel-heading">Create new project</div>
              <div class="panel-body">
                {{ Form::open( array('action' => 'ProjectsController@create', 'method' => 'get') )}}
                    <input type="hidden" name="client_id" value="{{ $client_id }}">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Project name">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-wide" value="create">
                    </div>
                {{ Form::close() }}
              </div>
            </div>
        </div>
    </div>
    {{-- SIDEBAR --}}

</div>

@stop()


