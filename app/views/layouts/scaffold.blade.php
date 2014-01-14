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

      <!-- Page content -->
      <div id="page-content-wrapper">

            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-md-offset-1">
                @yield('content')
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
            $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
        });

    </script>
    @stop
