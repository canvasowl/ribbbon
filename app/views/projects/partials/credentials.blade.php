<!-- server panel -->
<div class="panel panel-default">
  <div class="panel-heading">FTP & SSH Accounts</div>
  <div class="panel-body ftp-panel-body">					    			            							
 	<div class="row">
     	@foreach ($credentials as $credential)
     		@if ($credential->type == true)
	     		<div class="col-xs-12 col-md-4 credential-wrap" id="credential-wrap-{{ $credential->id }}">
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

	     		</div>
     		@endif
     	@endforeach
 	</div>					     	
  </div>	         	
</div>

<!-- other panel -->
<div class="panel panel-default">
  <div class="panel-heading">Other Credentials</div>
  <div class="panel-body other--panel-body">					    
 	<div class="row">
     	@foreach ($credentials as $credential)
     		@if ($credential->type == false)
	     		<div class="col-xs-12 col-md-4 credential-wrap" id="credential-wrap-{{ $credential->id }}">
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

	     		</div>
     		@endif
     	@endforeach
 	</div>
  </div>	         	
</div>