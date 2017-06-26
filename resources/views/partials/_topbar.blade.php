<nav class="navbar navbar-default zero_margin top_bar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/">B2C</a>
    </div>
    <div class="navbar-header navbar-right">
    @if (Auth::guest())
      <a href="{{ route('login') }}" class="btn btn-default btn-h1-spacing">Admin Login</a>
    @else
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.create') }}">Create New Post</a></li>
            <li><a href="{{ route('posts.index') }}">View Posts</a></li>
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
  </div><!-- /.container-fluid -->
</nav>