@extends('layouts.base')

@section('container')
<div class="jumbotron">
          <div class="container">
            <h1 class="entry-title">Hello, world!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>
              <a class="btn btn-primary btn-large">Learn more</a>
            </p>
          </div>
        </div>


  <div class="row-fluid">

    <div class="col-md-10 blog-main col-md-offset-1">
    @foreach ($posts as $post)
      @include('blog.post-preview')
    @endforeach
      <ul class="pagination">
        <li><a href="#">&laquo;</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&raquo;</a></li>
      </ul>
    </div><!-- /.blog-main -->

  </div><!-- /.row-fluid -->


@endsection



