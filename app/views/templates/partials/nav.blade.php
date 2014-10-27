<div class="hug hug-hudHeader">
	<div class="row">
		<div class="col-xs-12">
			<nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="/hud">Brand</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">

			        <li class="<?php echo ( Request::is('hud') ) ? 'active' : 'false'; ?>"><a href="/hud"><span class="glyphicon glyphicon-th"></span> Hud</a></li>
			        <li class="dropdown 
			        	<?php echo ( Request::is('clients') || Request::is('projects') || Request::is('tasks') || Request::is('clients/*') || Request::is('projects/*') || 
			        	Request::is('tasks/*') ) ? 'active' : 'false'; ?>" 
			        >
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li class="<?php echo ( Request::is('clients') || Request::is('clients/*') ) ? 'active' : 'false'; ?>"><a href="/clients">Clients</a></li>
			            <li class="<?php echo ( Request::is('projects') || Request::is('projects/*') ) ? 'active' : 'false'; ?>"><a href="/projects">Projects</a></li>
			            <li class="<?php echo ( Request::is('tasks') || Request::is('tasks/*') ) ? 'active' : 'false'; ?>"><a href="/tasks">Tasks</a></li>
			            <!-- <li class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li class="divider"></li>
			            <li><a href="#">One more separated link</a></li> -->
			          </ul>
			        </li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      	<li><a class="profile-link" href="/profile"><img class="circle" src="{{ asset('assets/img/guy.jpg') }}"></a></li>
			        <li><a href="/logout">Logout <i class="fa fa-sign-out"></i></a></li>			        
			      </ul>
			    </div><!-- /.navbar-collapse -->
			 </div><!-- /.container-fluid -->
			</nav>		
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