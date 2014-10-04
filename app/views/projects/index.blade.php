<?php # /app/views/projects/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">
            <div>
                <h2 class="pull-left no-margin-top">Projects</h2>
            </div>
            <div class="clearfix"></div>
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

	</div>
</div>

@stop()


