@extends('layouts.scaffold')


@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h1 class="entry-title">Create Post</h1>
    @include('posts.form', array('method' => 'POST', 'route' => 'posts.store'))
</div>
@stop



