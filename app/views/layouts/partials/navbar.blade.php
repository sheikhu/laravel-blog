<!-- Static navbar -->
<div class="navbar navbar-default navbar-fixed-top navbar-bg">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand @if(Request::is('/')) active@endif" href="{{ route('home') }}">

      <i class="fa fa-share fa-lg"></i>
    </a>
  </div>
  <div class="navbar-collapse collapse">
    {{ $menu }}

    @if(Auth::check())
      {{ $admin_menu}}
    @endif
  </div><!--/.nav-collapse -->
</div>
