<!-- Links -->
<ul class="nav nav-pills nav-stacked">
  <li><a href="/projects/{{ $project->id }}"><i class="fa fa-tasks"></i> Tasks</a></li>
  <li><a href="/projects/{{ $project->id }}/credentials"><i class="fa fa-key"></i> Credentials</a></li>
  @if( isOwner($project->id) == true )
    <li><a href="/projects/{{ $project->id }}/manage"><i class="fa fa-cog"></i> Manage</a></li>
  @endif
</ul>
<!-- links -->

