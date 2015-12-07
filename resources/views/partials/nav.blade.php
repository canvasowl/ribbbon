<a href="/" class="logo-section">
	<p>Ribbbon</p>		
</a>

<div class="user-section">
	<img class="circle" src="{{ App\User::get_gravatar(Auth::user()->email) }}">
	<p>{{Auth::user()->full_name}}</p>
	<span class="weight">w.{{ App\User::weight() }}</span>
</div>

<div class="nav-links">
	<a href="">Link</a>
	<a href="">Link</a>
	<a href="">Link</a>
	<a href="">Link</a>
</div>