@extends('layouts.base')

@section('container')

<div class="row first-block">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
    @include('contacts.form')
    </div>
</div>
@stop
