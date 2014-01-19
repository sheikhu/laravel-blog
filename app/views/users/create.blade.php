@extends('users.layout')

@section('content')

<h1>Create User</h1>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('users.form', ['route' => 'users.store', 'method' => 'POST'])
    </div>
</div>

@stop


