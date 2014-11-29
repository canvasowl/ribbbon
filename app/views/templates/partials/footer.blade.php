
@if ( !Auth::check() && Request::is('/')  || Request::is('about') || Request::is('faq')  )
	<div class="hug hug-footerOut">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					<ul class="list-inline list-style-none">
						<li><a href="/about">About <span class="site-name">Ribbbon</span></a></li>
						<li><a href="/faq">FAQ</a></li>
					</ul>	
					<ul class="list-inline list-style-none">						
						<li>Developed with<a target="_blank" href="http://laravel.com/"> Laravel</a> by <a target="_blank" href="http://www.punyweblab.com/"> Jefry Cruz.</a></li>						
					</ul>					
				</div>
				<div class="col-xs-12 col-md-6">
					<ul class="list-inline list-style-none pull-right">					
						<li>Copyright {{ date('Y') }} &copy; Jefry Cruz</li>
					</ul>				
				</div>
			</div>
		</div>
	</div>
@else
	<div class="hug hug-footerIn">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<center>
						<ul class="list-inline">
							<li><a href="/about">About Ribbbon</a></li>
							<li><a href="/faq">FAQ</a></li>							
						</ul>
						<ul class="list-inline">
							<li>Developed with<a target="_blank" href="http://laravel.com/"> Laravel</a> by <a target="_blank" href="http://www.punyweblab.com/"> Jefry Cruz.</a></li>
						</ul>
						<p>COPYRIGHT {{ date('Y') }} &copy; JEFRY CRUZ</p>
					</center>				
				</div>
			</div>
		</div>
	</div>
@endif


<!-- js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>