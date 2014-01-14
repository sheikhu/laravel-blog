<!-- Static navbar -->
<div class="navbar navbar-default navbar-fixed-top navbar-bg">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ URL::to('/')}}">
      <i class="fa fa-bullhorn"></i>
      404 Ads</a>
    </div>
    <div class="navbar-collapse collapse">
      {{ $menu }}

      @if(Auth::check())
        <ul class="nav navbar-nav pull-right">
          <li>
            <a href="{{ route('posts.index') }}">Admin</a>
          </li>

          <li><a href="{{ route('logout') }}">
            <i class="fa fa-power-off"></i>
            Logout
          </a></li>
        </ul>
      @endif
    </div><!--/.nav-collapse -->
  </div>
