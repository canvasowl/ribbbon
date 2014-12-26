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

