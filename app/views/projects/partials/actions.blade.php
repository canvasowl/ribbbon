<!-- ACTIONS -->
<div class="col-xs-12">
     <div>
        <h2 class="pull-left no-margin-top project-name">{{ $project->name }} ss<span class="badge badge-weight">{{ $total_weight }}</span></h2>
        <ul class="list-inline pull-right">
			@if($owner_id == Auth::id())
            	<li><a title="Go back" class="btn " href="/clients/{{ $project->client_id}}"><i class="fa fa-arrow-circle-o-left fa-lg"></i></a></li>
			@endif
        </ul>
        <div class="clearfix"></div>   
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