@extends('users.layout')

@section('content')

<h1>Create User</h1>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('users.form', ['route' => 'users.store', 'method' => 'POST'])
    </div>
</div>

@stop


