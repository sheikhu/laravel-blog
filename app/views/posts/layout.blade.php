@extends('layouts.scaffold')

@section('styles')
    @parent
    {{ HTML::style('vendors/chosen/chosen.css') }}
@stop


@section('scripts')

    @parent

    {{ HTML::script('vendors/chosen/chosen.jquery.min.js') }}

    <script>


        $('.select_multiple').chosen({allow_single_deselect:true});
        $('select.chosen').chosen({allow_single_deselect:true});

        $('[data-confirm]').on('click', function(e){

            e.preventDefault();

            if(confirm($(this).data('confirm')))
                $(this).parent('form').submit();
        });


    </script>

@stop
