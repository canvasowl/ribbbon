<?php # /app/views/projects/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row main-row">
    <div class="col-xs-12">
        <div>
            <h2>Projects</h2>
        </div>        
    </div>

	<div class="col-xs-12">
		<div class="app-wrapper">
            <div class="clearfix"></div>
            @if (count($projects) > 0 )
                <ul class="list-style-none">
                    @foreach ($projects as $project)
                        <?php $counter++; ?>
                        <a class="list-link"href="/projects/{{ $project->id }}">
                            <li>
                                <span class="numCount">{{ $counter }}</span> {{ $project->name}} 
                            </li>
                        </a>
                    @endforeach
                </ul>                
            @else
                <div class="alert alert-info" role="alert"><i class="fa fa-lightbulb-o"></i> In order to create a project you must first create a <a href="/clients">client</a></div>    
            @endif

	   </div>
    </div>
</div>

@stop()


