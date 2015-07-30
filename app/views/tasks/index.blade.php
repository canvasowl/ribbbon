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

                @if (count($tasks) == 0)
                    <section class="info" role="alert">
                    <i class="fa fa-lightbulb-o"></i> 
                        Once you start creating tasks for projects, you will see all your incompleted tasks here. 
                    </section>
                @else
                    <ul class="list-group tree">
                       @foreach ($tasks as $task)
                            <?php $counter++; ?>
                                <li class="list-group-item">
                                {{ $counter }}.
                                <a href="/clients/{{ clientIdByTask( $task->id ) }} }}" class="badge-client">{{ clientNameByTask( $task->id ) }}</a>
                                 <i class="fa fa-arrow-circle-o-right"></i> <a href="/projects/{{ $task->project->id }}" class="badge-project">{{ $task->project->name }}</a>
                                 <i class="fa fa-arrow-circle-o-right"></i> <span class="badge-task"><strong>{{ $task->name }}</strong></span>
                                 </li>
                        @endforeach
                    </ul>
                @endif

        </div>
	</div>
</div>

@stop()