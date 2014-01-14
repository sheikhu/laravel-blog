@extends('layouts.scaffold')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="entry-title">Edit Portfolio</h1>
        @include('portfolios.form', array('route' => array('portfolios.update', $portfolio->id), 'method' => 'PATCH'))
    </div>
@stop
