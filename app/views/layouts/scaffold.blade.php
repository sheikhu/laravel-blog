@extends('layouts.base')

@section('styles')
@parent
{{ HTML::style('css/admin.css')}}
@stop

@section('body')

<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">
    @include('layouts.partials.admin_sidebar')
  </div>

  <div class="container">
    <!-- Page content -->
  <div id="page-content-wrapper">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('layouts.partials.flashes')
      </div>

    <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      @yield('content')
    </div>

    </div>
  </div>
  </div>

</div>

@stop

@section('scripts')
@parent
<script>
  $('[data-confirm]').on('click', function(e){

    e.preventDefault();

    if(confirm($(this).data('confirm')))
      $(this).parent('form').submit();
  });

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
  });

</script>
@stop
