@extends('layouts.base')
@section('styles')


{{ HTML::style('vendors/chosen/chosen.css') }}
@parent

@stop


@section('container')

@foreach (array('success', 'warning', 'danger') as $key)
    @if (Session::has($key))
<div class="alert alert-{{$key}}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>{{ Str::title($key) }} ! </strong> {{ Session::get($key) }}
</div>
@endif
@endforeach
<div class="row-fluid">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 aside">
        <h2><a href="#"> Hello, Sheikhu </a></h2>
        @include('layouts.partials.admin_sidebar')
</div>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    @yield('content')
</div>

</div>
@stop

@section('footer')
@stop
@section('scripts')

@parent
{{ HTML::script('vendors/chosen/chosen.jquery.min.js') }}

<script>
    $(function () {

        $('.select_multiple').chosen({allow_single_deselect:true});
        $('select.chosen').chosen({allow_single_deselect:true});

        $('[data-confirm]').on('click', function(e){

            e.preventDefault();

            if(confirm($(this).data('confirm')))
                $(this).parent('form').submit();
        });
    });

</script>

@stop
