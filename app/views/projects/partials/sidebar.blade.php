	            	<!-- new task form -->
					<div class="panel panel-default">
					  <div class="panel-heading">Create new task</div>
					  <div class="panel-body">					    
		            	<i class="dimmed">For the weight, enter a number from 1-3, the higher the number the harder the task.</i>
		            	<div class="form-group">
		            		<form action="/tasks/create" method="get">
		            			<div class="row">		            				
		            				<div class="col-xs-10 no-padding-left">
				            			<label>Name</label>
				            			<input type="text" name="name" class="form-control" value="{{ Input::old('name') }}">		            				
			            			</div>
			            			<div class="col-xs-2 no-padding-right">
			            				<label>Weight</label>
			            				<div>
			            					<input placeholder="1" type="text" name="weight" class="form-control" value="{{ Input::old('weight') }}">
			            				</div>
			            			</div>
			            			<input type="hidden" name="projectId" value="{{ $project->id }}">
			            		</div>
		            			<div class="form-group">
		            				<br>
		            				<input type="submit" class="pull-right btn btn-success btn-wide" value="add task">	
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
				         		<input class="form-control" type="text" name="name" placeholder="Name" autofocus>					            		
				         		<input class="form-control" type="text" name="hostname" placeholder="Hostname">
				         		<input class="form-control" type="text" name="username" placeholder="Username">
				         		<input class="form-control" type="text" name="password" placeholder="Password">
				         		<input type="hidden" name="project_id" value="{{ $project->id }}">
				         		<input type="hidden" name="type" value="server"
				         		<br>
				         		<div class="col-xs-4 no-padding-left">
				         			<input class="form-control" type="text" name="port" placeholder="Port">
				         		</div>
				         		<div class="col-xs-8 no-padding-right">
					         		<button type="submit" class="btn btn-default">
						                <i class="fa fa-plus-square-o fa-lg"></i> Save
						            </button>
				         			<!-- <input class="btn btn-primary" type="submit" value="Save">	 -->
				         		</div>					         					         		
				         		<div class="clearfix"></div>
							{{ Form::close() }}		            			            	
						  </div>
						</div>
					</div>
					<!-- new credentials form -->