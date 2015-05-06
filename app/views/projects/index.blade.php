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

        {{--Owner Projects--}}
		<div class="app-wrapper">
            <div class="clearfix"></div>
            <h5>My Projects</h5>
            @if (count($projects) > 0 )
                <ul class="list-style-none">
                    @foreach ($projects as $project)
                        <?php $counter++; ?>
                        <a class="list-link"href="/projects/{{ $project->id }}">
                            <li><span class="numCount">{{ $counter }}</span> {{ $project->name}}</li>
                        </a>
                    @endforeach
                </ul>                
            @else
                <section class="info"><i class="fa fa-lightbulb-o">
                    </i> In order to create a project you must first create a <a href="/clients">client</a>
                </section>
            @endif
            <hr>
            {{--Member Projects--}}
            <h5>Projects shared with me</h5>
            @if (count($inProjects) > 0 )
                <ul class="list-style-none">
                    @foreach ($inProjects as $project)
                        <?php $counter++; ?>
                        <a class="list-link"href="/projects/{{ $project->id }}">
                            <li>
                                <span class="numCount">{{ $counter }}</span> {{ $project->name}}
                            </li>
                        </a>
                    @endforeach
                </ul>
            @else
                <section class="info" role="alert">
                    <i class="fa fa-lightbulb-o"></i>
                    No projects have been shared with you. In order to become a
                    member of a project a <i><b>project owner</b></i> has to send you an invite.
                </section>
            @endif
	   </div>
    </div>
</div>

@stop()


