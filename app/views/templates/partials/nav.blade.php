<div class="hug hug-hudHeader">
	<div class="row">
		<div class="col-xs-12">
			
		</div>
	</div>	
</div>

@if ($errors->first())
	<div class="hug">
		<div class="alert alert-danger alert-main animated fadeInDown" role="alert">
	  		<a href="#" class="alert-link">  			
	  			{{ $errors->first() }}  			
	  		</a>
		</div>
	</div>
@endif

@if(Session::has('success'))
	<div class="hug">
		<div class="alert alert-success alert-main animated fadeInDown" role="alert">
	  		<a href="#" class="alert-link">  			
	  			{{ Session::get('success') }}  			
	  		</a>
		</div>		
	</div>	
@endif