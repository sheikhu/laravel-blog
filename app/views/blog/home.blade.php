@extends('layouts.base')

@section('container')

  <div class="row first-block">

    <div class="col-md-9 blog-main">
      @if (count($posts))
        @foreach ($posts as $post)
        @include('blog.post-preview')
        @endforeach

        {{ $posts->links() }}
      @else
        <h3>There are no posts. <small><a href="{{ route('blog.home') }}">See all posts.</a></small></h3>
      @endif

    </div><!-- /.blog-main -->

    @section('sidebar')
      @include('layouts.partials.sidebar')
    @show

  </div><!-- /.row-fluid -->


  @endsection



