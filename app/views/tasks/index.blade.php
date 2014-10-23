<?php # /app/views/tasks/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">
            <div>
                <h2 class="pull-left no-margin-top">All Tasks</h2>
            </div>
            <div class="clearfix"></div>
            <ul class="list-style-none">
                @foreach ($tasks as $task)
                    <?php $counter++; ?>
                    <a class="list-link"href="/tasks/{{ $task->id }}">
                        <li>
                            <span class="numCount">{{ $counter }}</span> {{ $task->name}} 
                        </li>
                    </a>
                @endforeach
            </ul>

	</div>
</div>

@stop()