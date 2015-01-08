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
                <div class="alert alert-info" role="alert">
                    <i class="fa fa-lightbulb-o"></i> Start by creating your very first client.</a>
                </div> 
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
            <!-- Client create form -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Create a client</h3>
              </div>
              <div class="panel-body">  
                <form  action="/clients/create" method="get">
                    <div class="form-group">                                
                        <input class="form-control" type="text" name="name" placeholder="Client Name"/>                                
                    </div>
                    <div class="form-group">
                        <input class="pull-right btn btn-primary btn-wide" type="submit" value="Create Client"/>
                    </div>
                </form>                  
              </div>
            </div>                                    
            <!-- Client create form -->  
        </div>      
    </div>

</div>

@stop()


