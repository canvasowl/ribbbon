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
                @if (count($tasks) == 0)
                    <div class="alert alert-info" role="alert">
                    <i class="fa fa-lightbulb-o"></i> 
                        Once you start creating tasks for projects, you will see all your incompleted tasks here. 
                    </div>
                @else
                   @foreach ($tasks as $task)
                        <?php $counter++; ?>
                        <a class="list-link"href="/projects/{{ $task->project_id }}">
                            <li>
                                <span class="numCount">{{ $counter }}</span> {{ $task->name}} 
                            </li>
                        </a>
                    @endforeach
                @endif
 
            </ul>
        </div>
	</div>
</div>

@stop()