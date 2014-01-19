@extends('categories.layout')

@section('content')
{{ HTML::row(8)}}
    <h1 class="entry-title">Create Category</h1>
    @include('categories.form', array('route' => 'categories.store','method' => 'POST'))

{{ HTML::end_row() }}

@stop


