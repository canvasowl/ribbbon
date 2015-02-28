{{-- UPLOAD FILES FORM --}}
<div><strong>Manage project files</strong></div><br>
<div>
	<div class="dynamic-form">
		{{ Form::open(array('action' => 'FilesController@store', 'method' => 'post')) }}
			<input class="form-control" type="text" name="name" placeholder="File Name">
     		<input type="hidden" name="project_id" value="{{ $project->id }}">
     		<br>
     		<div class="col-xs-4 no-padding-left">
     			<input class="form-control other" type="text" name="port" placeholder="Port">
     		</div>
     		<div class="col-xs-8 no-padding-right">
         		<button type="submit" class="btn btn-default">
	                 <i class="fa fa-cloud-upload fa-lg"></i> Upload File
	            </button>
     		</div>
     		<div class="clearfix"></div>
		{{ Form::close() }}
	</div>
</div>
{{-- UPLOAD FILES FORM --}}