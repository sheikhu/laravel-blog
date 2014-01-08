@extends('layouts.scaffold')


@section('content')

<h1>Create Post</h1>
    @include('posts.form', array('method' => 'POST', 'route' => 'posts.store'))

@overwrite



