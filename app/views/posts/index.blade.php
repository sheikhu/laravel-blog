@extends('layouts.base')


@section('container')
    <div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
    @include('posts.list')
    </div>
    </div>
@overwrite


