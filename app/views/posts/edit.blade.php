@extends('posts.layout')

@section('container')

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<h1 class="entry-title">Edit Post</h1>
    @include('posts.form', array('method' => 'PATCH', 'route' => array('posts.update', $post->id)) )
</div>
@stop


