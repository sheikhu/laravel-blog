@extends('layouts.scaffold')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h1 class="entry-title">Edit Category</h1>
    @include('categories.form', array('route' => array('categories.update', $category->id), 'method' => 'PATCH'))
</div>

@stop
