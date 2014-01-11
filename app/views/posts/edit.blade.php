@extends('layouts.scaffold')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h1 class="entry-title">Edit Post</h1>
    @include('posts.form', array('method' => 'PATCH', 'route' => array('posts.update', $post->id)) )
</div>
@stop


