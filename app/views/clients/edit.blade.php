<?php # /app/views/clients/edit.blade.php  ?>
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
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="app-wrapper">
            @include('clients.partials._edit')
        </div>
    </div>
    {{-- CONTENT --}}

    {{-- SIDEBAR --}}
    <div class="col-xs-12 col-sm-4">

    </div>
    {{-- SIDEBAR --}}

</div>

@stop()


