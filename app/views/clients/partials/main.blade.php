<h4>Client info</h4>
@if( $client->point_of_contact == "" && $client->phone_number == "" && $client->email == "" )
    <p><a title="Edit client" class="btn no-padding-right no-padding-left" href="/clients/{{ $client->id }}/edit"><i class="fa fa-pencil-square-o fa-lg"></i> Edit</a> this contact for future reference.</p>
@else
    <ul class="list-style-none">
        <li><strong>Point of contact:</strong> {{ $client->point_of_contact }}</li>
        <li><strong>Phone number:</strong> {{ $client->phone_number}}</li>
        <li><strong>Email:</strong> {{ $client->email }}</li>
    </ul>
@endif

<hr>
<h4>Client projects</h4>
<ul class="list-style-none">
    @if( count($projects) != 0)
        @foreach ($projects as $project)
            <li><a href="/projects/{{ $project->id }}">{{ $project->name }}</a></li>
        @endforeach
    @else
    <div class="alert alert-info" role="alert">
        <i class="fa fa-lightbulb-o"></i>
        This client has no projects at the moment, to create a project for
        this client use the for to the side.
    </div>
    @endif
</ul>

<hr>
<strong>Note:</strong>
<p class="dimmed">Deleting <i>{{ $client->name }}</i> will delete all projects and tasks associated with this client.</p>
{{ Form::open(array('action' => 'ClientsController@destroy', 'method' => 'delete')) }}
    <input type="hidden" name="id" value="{{ $client->id }}">
    <input type="submit" class="btn btn-danger" value="Delete Client" />
{{ Form::close() }}