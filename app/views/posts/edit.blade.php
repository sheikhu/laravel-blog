@extends('posts.layout')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h2>
        <i class="fa fa-thumb-tack"></i>
        Edit Post
        <small><a href="{{ route('posts.create')}}">New post</a></small>
    </h2>
    @include('posts.form', array('method' => 'PATCH', 'route' => array('posts.update', $post->id)) )
</div>
@stop


