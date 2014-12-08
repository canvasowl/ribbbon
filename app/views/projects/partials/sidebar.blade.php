<!-- new task form -->
<div class="panel panel-default">
  <div class="panel-heading">Create new task</div>
  <div class="panel-body">					    
	<i class="dimmed">For the weight, enter a number from 1-3, the higher the number the harder the task.</i>
	<div class="form-group">
		<form action="/tasks/create" method="get">
			<div class="row">		            				
				<div class="col-xs-9 no-padding-left">
        			<label>Name</label>
        			<input type="text" name="name" class="form-control" value="{{ Input::old('name') }}" autofocus>		            				
    			</div>
    			<div class="col-xs-3 no-padding-right">
    				<label>Weight</label>
    				<div>
    					<input placeholder="1" type="text" name="weight" class="form-control" value="{{ Input::old('weight') }}">
    				</div>
    			</div>
    			<input type="hidden" name="projectId" value="{{ $project->id }}">
    		</div>
			<div class="form-group">
				<br>
				<input type="submit" class="pull-right btn btn-primary btn-wide" value="add task">	
			</div>		            					            			
		</form>
	</div>
  </div>
</div>	         	
<!-- new task form -->

<!-- new credentials form -->
<div class="dynamic-form">
	<div class="panel panel-default">
	  <div class="panel-heading">Create new credentials</div>
	  	<div class="panel-body">					    
			{{ Form::open(array('action' => 'CredentialsController@create', 'method' => 'get')) }}
				<label>FTP/SSH</label> <input type="radio" name="type" value="server" checked> 
				<label>Other</label> <input type="radio" name="type" value="other">							
				<input class="form-control" type="text" name="name" placeholder="Name">
	     		<input class="form-control" type="text" name="hostname" placeholder="Hostname">
	     		<input class="form-control" type="text" name="username" placeholder="Username">
	     		<input class="form-control" type="text" name="password" placeholder="Password">
	     		<input type="hidden" name="project_id" value="{{ $project->id }}">
	     		<br>
	     		<div class="col-xs-4 no-padding-left">
	     			<input class="form-control" type="text" name="port" placeholder="Port">
	     		</div>
	     		<div class="col-xs-8 no-padding-right">
	         		<button type="submit" class="btn btn-default">
		                <i class="fa fa-plus-square-o fa-lg"></i> Save
		            </button>
	     		</div>					         					         		
	     		<div class="clearfix"></div>
			{{ Form::close() }}		            			            	
	  	</div>
	</div>
</div>
<!-- new credentials form -->