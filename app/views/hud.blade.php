@extends('templates/hud_master')


@section('content')

	<div class="row">
		<!-- <div class="col-xs-12"> -->
			
		<div class="col-xs-4">
			<div class="card">
				<header><h3>New</h3></header>
				<div class="content-pad">
					<ol>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
					</ol>
				</div>
				<footer><a href="">See all</a></footer>
			</div>
		</div>


		<div class="col-xs-4">
			<div class="card">
				<header><h3>Overdue</h3></header>
				<div class="content-pad">
					<ol>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
						<li><a href="">Sample item</a></li>
					</ol>
				</div>
				<footer><a href="">See all</a></footer>				
			</div>			
		</div>

		<div class="col-xs-4">
			<div class="card">
				<header><h3>Message</h3></header>
				<div class="content-pad">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad headerinim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>				
				</div>
			</div>			
		</div>

		<!-- </div>	 -->
	</div>

@stop()