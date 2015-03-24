<!-- ACTIONS -->
<div class="col-xs-12">
     <div>
        <h2 class="no-margin-top project-name">
            <a href="/clients/{{ $project->client->id }}">{{ $project->client->name }}</a>
            <i class="fa fa-arrow-circle-o-right"></i> {{ $project->name }} <span class="badge badge-weight">{{ $total_weight }}</span></h2>
    </div>	
  	<!-- info pills -->
  	<ul class="list-inline">
  		@if ($project->production)
  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->production }}">Production</a></li>
  		@endif
  		@if ($project->stage)
  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->stage }}">Staging</a></li>
  		@endif
  		@if ($project->dev)
  			<li><a class="pill pill-primary" target="_blank" href="{{ $project->dev }}">Development</a></li>
  		@endif
  		@if ($project->github)
  			<li><a class="pill pill-dark" target="_blank" href="{{ $project->github }}">Github</a></li>
  		@endif
  	</ul>
  	<!-- info pills -->	    
</div>