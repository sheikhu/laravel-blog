@extends('layouts.scaffold')

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h1>
    {{ $post->title }}
    </h1>
    <b>Category</b> <i class="fa fa-arrow-circle-right"></i>
    {{ $post->category->name }}

        <div class="panel panel-default">

        <div class="panel-body">
            <div class="row">
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <p class="justify">
                {{ $post->content }}
            </p>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <a href="{{ asset($post->image->url) }}" class="thumbnail">
            <img class="img-responsive" src="{{ asset($post->image->url) }}" alt="">
        </a>
    </div>
            </div>
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
                <li><a href="{{ route('tags.show', array($tag->id))}}">{{ $tag->name }}</a></li>
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

</div>




</div>
</div>




@stop
