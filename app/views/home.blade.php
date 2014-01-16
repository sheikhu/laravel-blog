@extends('layouts.base')


@section('container')
<div class="jumbotron bg-white">
  <div class="container">
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

<span class="fa-stack fa-4x">
  <i class="fa fa-circle fa-stack-2x"></i>
  <i class="fa fa-code fa-stack-1x fa-inverse"></i>
</span>
</div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <h2 class="entry-title">Cherchez vous un développeur web ?</h2>
        <p class="justify">
          Je suis passioné par le web, développeur web depuis 3 ans.
          Vous pouvez consulter mon <span class="text-info">
          <a href="#">Portfolio</a>
        </span>, et si vous êtes satisfait par mes travaux, vous pouvez me
        <span class="text-info"><a href="#">contacter.</a></span>
      </p>

    </div>
  </div>
</div>
</div>


<div class="row first-block">

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <h3>Test <small> - Symfony 2</small></h3>
    <a href="#" class="thumbnail">
      <img src="{{ asset('images/jobc.jpg') }}" alt="" class="img-responsive">
    </a>
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <h3>Test <small> - Symfony 2</small></h3>
    <a href="#" class="thumbnail">
      <img src="{{ asset('images/wallx.jpg') }}" alt="" class="img-responsive">
    </a>
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <h3>Test <small> - Symfony 2</small></h3>
    <a href="#" class="thumbnail">
      <img src="{{ asset('images/wally.jpg') }}" alt="" class="img-responsive">
    </a>
  </div>

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <h3>Test <small> - Symfony 2</small></h3>
    <a href="#" class="thumbnail">
      <img src="{{ asset('images/jobd.jpg') }}" alt="" class="img-responsive">
    </a>
  </div>

</div><!-- /.row-fluid -->

<div class="row first-block">
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4 col-xs-offset-4">
    <h4 class="text-center">

    <a href="{{ route('portfolio') }}" class="btn btn-primary">
    <i class="fa fa-pencil"></i>
    Voir mes réalisations.
    </a>
    </h4>
  </div>
</div>



@endsection



