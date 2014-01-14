@extends('posts.layout')


@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2>
            <i class="fa fa-thumb-tack"></i>
            Create a new post
        </h2>
    @include('posts.form', array('method' => 'POST', 'route' => 'posts.store'))
</div>
@stop



