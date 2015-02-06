@extends('templates.hud_master')


@section('content')

<div class="row main-row">

	<div class="col-xs-12"><h2>Search results for: "<strong><i>{{ $q }}</i></strong>"</h2></div>
	
	<div class="col-xs-12 col-md-8">

		<!-- Clients -->
		<div class="app-wrapper">                   				  	
			<h4>Client results</h4>			
				@if (count($clients) > 0 )
					<ol>
						@foreach ($clients as $client)
							<li><a href="/clients/{{ $client->id }}">{{ $client->name }}</a></li>
						@endforeach
					</ol>
				@else
					<p class="dimmed">Sorry I couldn't find nothing....</p>
				@endif		
		</div>

		<!-- Projects -->
		<div class="app-wrapper">                   				  	
			<h4>Project results</h4>
			@if (count($projects) > 0)
                <ol>
                    @foreach ($projects as $project)
                        <li><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
                    @endforeach
                </ol>
            @else
                <p class="dimmed">Sorry I couldn't find nothing....</p>
            @endif
		</div>

		<!-- Tasks -->
		<div class="app-wrapper">                   				  	
			<h4>Task results</h4>
		    @if( count($tasks) >0 )
                <ol>
                    @foreach ($tasks as $task)
                        <li><a href="">{{ $task->name }}</a></li>
                    @endforeach
                </ol>
		    @else
		        <p class="dimmed">Sorry I couldn't find nothing....</p>
		    @endif
		</div>				

	</div>
	<!-- end of col 8 -->

	<div class="col-xs-12 col-md-4">
		
	</div>

</div>


@stop()
