@extends('posts.layout')


@section('container')

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
<h1>Create Post</h1>
    @include('posts.form', array('method' => 'POST', 'route' => 'posts.store'))
</div>

@overwrite



