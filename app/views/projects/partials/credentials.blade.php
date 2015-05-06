<!-- new credentials form -->
<div><strong>Create new credentials</strong></div><br>
<div>
	<div class="dynamic-form">
		{{ Form::open(array('action' => 'CredentialsController@create', 'method' => 'get')) }}
			<label>FTP/SSH</label> <input id="ftp" type="radio" name="type" value="server" checked>
			<label>Other</label> <input id="other" type="radio" name="type" value="other">
			<input class="form-control" type="text" name="name" placeholder="Name">
     		<input class="form-control other" type="text" name="hostname" placeholder="Hostname">
     		<input class="form-control" type="text" name="username" placeholder="Username">
     		<input class="form-control" type="text" name="password" placeholder="Password">
     		<input type="hidden" name="project_id" value="{{ $project->id }}">
     		<br>
     		<div class="col-xs-4 no-padding-left">
     			<input class="form-control other" type="text" name="port" placeholder="Port">
     		</div>
     		<div class="col-xs-8 no-padding-right">
         		<button type="submit" class="btn btn-primary">
	                <i class="fa fa-plus-square-o fa-lg"></i> Save
	            </button>
     		</div>					         					         		
     		<div class="clearfix"></div>
		{{ Form::close() }}	
	</div>
</div>
<!-- new credentials form -->


<hr>


@if( count($credentials) > 0)
    <!-- server panel -->
    <div>
      <div><strong>FTP & SSH Accounts</strong></div>
      <div class="ftp-panel-body">
        <div class="row">
            @foreach ($credentials as $credential)
                @if ($credential->type == true)
                    <div class="col-xs-12 col-md-6 credential-wrap" id="credential-wrap-{{ $credential->id }}"><br>
                        <section class="info">
                            <h4>{{ $credential->name }}</h4	>
                            <p><strong>Hostname:</strong> {{ $credential->hostname }}</p>
                            <p><strong>Username:</strong> {{ $credential->username }}</p>
                            <p><strong>Password:</strong> {{ $credential->password }}</p>
                            <p><strong>Port:</strong> {{ $credential->port }}</p>

                            @if($owner_id == Auth::id())
                                <div class="actions">
                                    <ul class="inline-list list-style-none">
                                        <li>
                                        {{ Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) }}
                                            <input type="hidden" name="id" value="{{ $credential->id }}">
                                            <button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}
                                        </li>
                                        <?php /*<li>
                                            <button title="edit" class="btn btn-default"><a href=""><i class="fa fa-pencil"></i></a></button>
                                        </li>*/ ?>
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>
                            @endif
                        </section>
                    </div>
                @endif
            @endforeach
        </div>
      </div>
    </div><br>

    <!-- other panel -->
    <div>
      <div><strong>Other Credentials</strong></div>
          <div class="other-panel-body">
            <div class="row">
                @foreach ($credentials as $credential)
                    @if ($credential->type == false)
                        <div class="col-xs-12 col-md-6 credential-wrap" id="credential-wrap-{{ $credential->id }}"><br>
                            <section class="info">
                                <h4>{{ $credential->name }}</h4	>
                                <p><strong>Username:</strong> {{ $credential->username }}</p>
                                <p><strong>Password:</strong> {{ $credential->password }}</p>

                                @if($owner_id == Auth::id())
                                    <div class="actions">
                                        <ul class="inline-list list-style-none">
                                            <li>
                                            {{ Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) }}
                                                <input type="hidden" name="id" value="{{ $credential->id }}">
                                                <button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>
                                            {{ Form::close() }}
                                            </li>
                                            <div class="clearfix"></div>
                                        </ul>
                                    </div>
                                @endif
                            </section>
                        </div>
                    @endif
                @endforeach
            </div>
          </div>
    </div>
@endif