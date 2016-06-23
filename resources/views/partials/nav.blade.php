{{--<a href="/" class="logo-section">--}}
	{{--<img src="{{\App\Helpers\Helpers::logoUrl()}}" alt="Ribbbon">--}}
{{--</a>--}}

<div class="user-section">
	<a href="/profile"><img class="circle" src="{{ App\User::get_gravatar(Auth::user()->email) }}">
	<p>{{Auth::user()->full_name}}</p>
	</a>
</div>

{!! Form::open(array('action' => 'HomeController@search','method' => 'get')) !!}
	<div class="form-group search">
		{!! Form::text( 'q', null, array('class' => 'form-control search-bar', "placeholder" => "Search" )) !!}
	</div>	    			
{!! Form::close() !!}	

<div class="menu">
	<a class="<?php echo ( Request::is('hud') ) ? 'active' : 'false'; ?> <?php echo ( Request::is('/') ) ? 'active' : 'false'; ?>" href="/"><i class="icon ion-ios-home"></i> Hud</a>
	<a class="<?php echo ( Request::is('clients') ) ? 'active' : 'false'; ?>" href="/clients"><i class="icon ion-person"></i> Clients</a>
	<a class="<?php echo ( Request::is('profile') ) ? 'active' : 'false'; ?>" href="/profile"><i class="icon ion-gear-b"></i> Settings</a>
	<a href="/logout"><i class="icon ion-android-exit"></i> Logout</a>
</div>

<div class="line"><hr></div>

