@extends('layouts.scaffold')

@section('styles')
@parent
{{ HTML::style('vendors/chosen/chosen.css') }}
@stop


@section('scripts')

@parent
{{ HTML::script('vendors/chosen/chosen.jquery.min.js') }}


@stop
