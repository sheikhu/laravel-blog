@extends('posts.layout')

@section('container')

<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title entry-title"> {{ $post->title }}</h1>
        </div>
        <div class="panel-body">
            {{ $post->content }}
        </div>
        <div class="panel-footer">

          <a href="{{route('posts.edit', array($post->id))}}" class="btn btn-primary">
              <i class="fa fa-pencil"></i> Edit
          </a>


          @if($post->tags)
          <div class="btn-group">
              <button type="button" class="btn btn-info">Tags</button>
              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                @foreach ($post->tags as $tag)
                <li><a href="#">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>

        @endif
        <div class="pull-right">{{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
            {{ Form::submit('Delete', array(
                'class' => 'btn btn-danger',
                'data-confirm' => 'Are you sure ?')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

    {{ link_to_route('posts.index', 'Return to all posts', [], array('class' => 'btn btn-primary')) }}






    @stop
