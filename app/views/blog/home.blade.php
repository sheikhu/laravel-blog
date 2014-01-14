@extends('layouts.base')

@section('container')

  <div class="row first-block">

    <div class="col-md-9 blog-main">
      @foreach ($posts as $post)
      @include('blog.post-preview')
      @endforeach

      {{ $posts->links() }}
    </div><!-- /.blog-main -->

    @section('sidebar')
      @include('layouts.partials.sidebar')
    @show

  </div><!-- /.row-fluid -->


  @endsection



