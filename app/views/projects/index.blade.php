<?php # /app/views/projects/index.blade.php  ?>
@extends('templates/hud_master')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="app-wrapper">
            <div>
                <h2 class="pull-left no-margin-top">Projects</h2>
            </div>

			<table class="table">
				<thead>                    
                    @foreach ($projects as $project)
                        <?php $counter++; ?>
                        <tr>
                            <td><span class="numCount">{{ $counter }}</span></td>
                            <td>
                                <a class="pull-left" title="view {{ $project->name }}" href="/projects/{{ $project->id }}">{{ $project->name }}</a>
                                <ul class="pull-right list-inline">
                                    <li><a title="edit {{ $project->name }}" href="/projects/{{ $project->id }}/edit"><i class="fa fa-magic"></i></a></li>
                                    <li><a title="view {{ $project->name }}" href="/projects/{{ $project->id }}"><i class="fa fa-eye"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </td>
                        </tr>                        
                    @endforeach                

				</thead>
			</table>
	</div>
</div>

@stop()


