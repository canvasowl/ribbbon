<?php # /app/views/tasks/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row main-row">
    <div class="col-xs-12">
        <div>
            <h2>All Tasks</h2>
        </div>        
    </div>

	<div class="col-xs-12">
		<div class="app-wrapper">
            <ul class="list-style-none">
                @foreach ($tasks as $task)
                    <?php $counter++; ?>
                    <a class="list-link"href="/projects/{{ $task->project_id }}">
                        <li>
                            <span class="numCount">{{ $counter }}</span> {{ $task->name}} 
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
	</div>
</div>

@stop()