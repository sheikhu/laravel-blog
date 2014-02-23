<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../../assets/ico/favicon.png">

  <title>Navbar Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->

  @section('styles')

  {{ HTML::style('bootstrap/css/bootstrap.css') }}
  {{ HTML::style('bootstrap/font-awesome/css/font-awesome.css') }}
  {{ HTML::style('vendors/summernote/dist/summernote.css')}}
  {{ HTML::style('vendors/redactor/redactor/redactor.css')}}
  {{ HTML::style('css/site.css') }}

  @show

  <!-- Custom styles for this template -->


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
      <![endif]-->

    </head>

    <body>
@section('navbar')
  @include('layouts.partials.navbar')
@show

@section('body')

        <div id="master-container" class="container">
          @yield('container')

          @section('footer')
            @include('layouts.partials.footer')
          @show
        </div> <!-- /container -->




@show
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @section('scripts')
    {{ HTML::script('bootstrap/js/vendors/jquery.js') }}
    {{ HTML::script('bootstrap/js/bootstrap.js') }}
    {{ HTML::script('vendors/summernote/dist/summernote.min.js')}}
    {{ HTML::script('vendors/redactor/redactor/redactor.min.js')}}
    <script>
      $(function() {
      $('.redactor').redactor({autoresize: false});
    });
  </script>

  @show
</body>
</html>

