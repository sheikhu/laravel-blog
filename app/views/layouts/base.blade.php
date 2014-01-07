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

  <!-- include (codemirror.css, codemirror.js, xml.js, formatting.js) -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>
  @show

  <!-- Custom styles for this template -->
  <link href="navbar.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
      <![endif]-->

      <style type="text/css">
        body{
          padding-top: 81px;
          background-color: #F1F1F1;
          /*background-image: url("{{ asset('images/bg.png') }} ");*/
          font-size: 18px;
          font-family: "Kreon", sans-serif;
        }
        #master-container{background-color: #FFF;}
        .no-rounded{border-radius: 0px !important;}
        .justify{text-align:justify;}

        .first-block{
          background: #73C47E;
          background-image: url("{{ asset('images/bg3.png') }} ");
          background-attachment: fixed;
        }
        .second-block{
          background: #4191DD;
          background-image: url("{{ asset('images/bg2.png') }} ");
          background-attachment: fixed;
        }

        .bg-white{background-color: #FFF;}
        .no-border{border-width: 0px 0px 0px 0px;}
        /*.jumbotron h1{color: #FFF;}*/
      </style>
    </head>

    <body>


      <!-- Static navbar -->
      <div class="navbar navbar-default navbar-fixed-top bg-white">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <i class="fa fa-bullhorn"></i>
            404 Ads</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">
              <li class="active"><a href="#">Accueil</a></li>
              <li><a href="#">Portfolio</a></li>
              <li>
                <a href="{{ route('posts.index')}}">
                  <i class="fa fa-pencil"></i> Blog
                </a>
              </li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>


        <div id="master-container" class="container">
          @yield('container')
        </div> <!-- /container -->


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

      /*
      var current = 'navbar-static-top';

      $('ul.navbar-nav li a').on('click', function(e){
        alert(current);
        if($('.navbar').hasClass(current))
        {
          e.preventDefault();
          $('.navbar').removeClass(current).addClass($(this).attr('id'));
          current = $(this).attr('id');

          $(this).parents().removeClass('active');
          $(this).parent().addClass('active');

        }

      });
      */

      $('.redactor').redactor({autoresize: false});

    });
  </script>

  @show
</body>
</html>
