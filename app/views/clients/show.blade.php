<?php # /app/views/clients/show.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row main-row">
    <div class="col-xs-12">
        <h2 class="pull-left">{{ $client->name }}
            <a title="Edit client" class="btn btn-default" href="/clients/{{ $client->id }}/edit">
                <i class="fa fa-pencil-square-o fa-lg"></i>
            </a>
        </h2>
    </div>


    {{-- CONTENT --}}
    <div class="col-xs-12 col-sm-8">
        <div class="app-wrapper">
            @include('clients.partials.main')
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


