<?php # /app/views/clients/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row main-row">
    <div class="col-xs-12">
        <div>
            <h2>Clients</h2>
        </div>      
    </div>

	<div class="col-xs-12 col-md-8">
		<div class="app-wrapper">  

            @if ( count($clients) == 0 )
                <section class="info" role="alert">
                    <i class="fa fa-lightbulb-o"></i> Start by creating your very first client.</a>
                </section>
            @else    
                <!-- List clients -->
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
                <!-- List clients -->
            @endif      
        </div>
	</div>

    <div class="col-xs-12 col-md-4">
        <div class="app-wrapper">
            @include('clients.forms.create')
        </div>      
    </div>

</div>

@stop()


