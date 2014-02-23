@extends('posts.layout')

@section('content')

        <h2>
            <i class="fa fa-thumb-tack"></i>
            Edit Post
            <small><a href="#">New post</a></small>
        </h2>

        <h4>
            <span class="label label-info">Created at</span>
            <small>{{ date('d-m-Y', $post->created_at->timestamp)}}</small>
        </h4>

        <div class="panel panel-primary">
<div class="panel-heading">

            <h2 class="panel-title">
            {{ $post->title }}
            <i class="fa fa-arrow-circle-right"></i>
            <small>
            <a href="{{ route('categories.show', $post->category->id)}}" class="no-decoration"><span class="label label-default">{{ $post->category->name }}</span></a>
            </small>
        </h2>
      </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <p class="justify">
                            {{ $post->content }}
                        </p>
                    </div>

                    @if ($post->image)
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <a href="{{ asset($post->image->path())}}" class="thumbnail">
                            <img class="img-responsive" src="{{ asset($post->image->path()) }}" alt="">
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="panel-footer">

              <a href="{{route('posts.edit', array($post->id))}}" class="btn btn-primary">
                  <i class="fa fa-pencil"></i> Edit
              </a>


              @if($post->tags)
              <div class="btn-group">
                  <button type="button" class="btn btn-primary">Tags</button>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
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


@stop
