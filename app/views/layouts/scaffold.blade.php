@extends('layouts.base')

<?php
HTML::macro('listItem', function($params){


    if( Request::is($params['pattern'].'*') ) {
        $active = "active";
    }
    else {
        $active = '';
    }

    if(isset($params['attr']['class']))
        $params['attr']['class'] .= 'list-group-item ' . $active;
    else
        $params['attr']['class'] = 'list-group-item ' . $active;

    return link_to($params['route'], $params['label'], $params['attr']);
});

?>
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
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 aside">
        <h1><a href="#"> Hello, Sheikhu </a></h1>

        <div class="list-group">
        {{ HTML::listItem(array(
                'route'=>route('posts.index'),
                'label' => 'Posts',
                'attr' => array(),
                'pattern' => 'posts'
                ))
        }}
        {{ HTML::listItem(array(
                'route'=>route('categories.index'),
                'label' => 'Categories',
                'attr' => array(),
                'pattern' => 'categories'
                ))
        }}
        {{ HTML::listItem(array(
                'route'=>route('tags.index'),
                'label' => 'Tags',
                'attr' => array(),
                'pattern' => 'tags'
                ))
        }}
        {{ HTML::listItem(array(
                'route'=>route('users.index'),
                'label' => 'Users',
                'attr' => array(),
                'pattern' => 'users'
                ))
        }}

    </div>
</div>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
    @yield('content')
</div>

</div>
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
