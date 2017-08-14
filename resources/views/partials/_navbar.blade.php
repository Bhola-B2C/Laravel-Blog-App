<nav class="navbar navbar-inverse edit-nav" id="nav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">B2C</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Archives</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search"> 
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
        </div>
      </form>
      @if(1==2)
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi {{ $user->getName() }}<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li role="separator" class="divider"></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      @else
        <div class="navbar-right">
          <a href="{{route('social.redirect','facebook')}}" class="btn-link"><img src="/images/fb.png" alt="" height="35" style="margin-bottom: 5px; margin-top: 5px; margin-left: 10px"></a>
          <a href="{{route('social.redirect','google')}}" class="btn-link"><img src="/images/gplus.png" alt="" height="37" style="margin-bottom: 5px; margin-top: 5px; margin-left: 10px"></a>

        </div>
      @endif()
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>