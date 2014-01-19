@extends('users.layout')

@section('content')

<h1>Edit User</h1>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    @include('users.form', array('method' => 'PATCH', 'route' => array('users.update', $user->id)))
    </div>
</div>
@stop
