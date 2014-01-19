@extends('layouts.base')

@section('container')

<div class="row">
    <div class="col-md-10 blog-main col-md-offset-1">
      @include('blog.post-single')
    </div><!-- /.blog-main -->

  </div><!-- /.row-fluid -->
@stop
