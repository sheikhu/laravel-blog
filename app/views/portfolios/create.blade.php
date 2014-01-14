@extends('layouts.scaffold')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h1 class="entry-title">Create Portfolio</h1>
    @include('portfolios.form', array('route' => 'portfolios.store', 'method' => 'POST'))
</div>
@stop
