	<div class="container-fluid footer">
			<div class="container">
				<div class="row btn-h1-spacing">
					<div class="col-md-3 col-md-offset-0">
						<h4>About Me</h4>
						<div class="content-footer">
							<p>
								<img src="https://s.gravatar.com/avatar/b5d514eba12581d6dd000c4a817a2a95?s=50" alt="" class="footer-image">
								This website is created by Bhola Nath Chowdhary, a member of GNU Linux User Group, NIT Durgapur.
								Currently pursuing B.Tech ECE, and great php developer and competitive coder(bhola_nit codechef handle). This website is made in Laravel to tell the power of Laravel, the open source framework. :D
							</p>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-1">
						<h4>Quote of the day:</h4>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<h4>Follow us on:</h4>
					</div>
				</div>
			</div>
	</div>
	<div class="sub-footer">
		<div class="container">
			<div class="row btn-h1-spacing">
				<div class="col-md-6">
					<p>Copyright © 2017. Created by Bhola(GNU Linux User Group, NIT DGP)</p>
				</div>
				<div class="col-md-6">
					<div class="navbar-header navbar-right" style="margin-top: -5px">
						@if (Auth::guest())
							<a href="{{ route('login') }}" class="">Admin Login</a>
						@else
							<ul class="nav navbar-nav navbar-right">
								<li class="dropup">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi {{ Auth::user()->name }} <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{{ route('posts.create') }}">Create New Post</a></li>
										<li><a href="{{ route('posts.index') }}">View Posts</a></li>
										<li><a href="{{ route('categories.index') }}">Categories</a></li>
										<li role="separator" class="divider"></li>
										<li>
											<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>