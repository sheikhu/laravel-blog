@extends('layouts.base')

@section('container')
<div class="row first-block">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <h1>Works </h1>
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

</div>


@stop
