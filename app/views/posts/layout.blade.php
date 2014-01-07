@extends('layouts.base')

@section('styles')


    {{ HTML::style('vendors/chosen/chosen.css') }}
    @parent

@stop

@section('scripts')

    @parent
    {{ HTML::script('vendors/chosen/chosen.jquery.min.js') }}

    <script>
    $(function () {

        $('.select_multiple').chosen({allow_single_deselect:true});
        $('select.chosen').chosen({allow_single_deselect:true});
    });

    </script>

@stop
