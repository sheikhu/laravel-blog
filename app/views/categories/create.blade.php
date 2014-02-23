@extends('categories.layout')

@section('content')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <h1 class="entry-title">Create Category</h1>
    @include('categories.form', array('route' => 'categories.store','method' => 'POST'))

</div>

@stop


