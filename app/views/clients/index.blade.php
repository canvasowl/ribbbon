<?php # /app/views/clients/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">
            <div>
                <h2 class="pull-left no-margin-top">Clients</h2>
                <form class="pull-right" action="/clients/create" method="get">
                    <div class="form-group">
                            <ul class="list-inline">
                                <li><input class="form-control" type="text" name="name" placeholder="Client Name"/></li>
                                <li><input class="btn btn-default" type="submit" value="Create Client"/></li>
                            </ul>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            
            <ul class="list-style-none">
                @foreach ($clients as $client)
                    <?php $counter++; ?>
                    <a class="list-link"href="/clients/{{ $client->id }}">
                        <li>
                            <span class="numCount">{{ $counter }}</span> {{ $client->name}} 
                        </li>
                    </a>
                @endforeach
            </ul>
	</div>
</div>

@stop()


