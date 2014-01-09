@extends('layouts.scaffold')

@section('content')

<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <h1>Show Tag</h1>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                 <td>{{{ $tag->name }}}</td>
                 <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}
                 </td>
                 <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>{{ link_to_route('tags.index', 'Return to all tags') }}</p>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <h1>Posts</h1>
    <div class="list-group">
        @if ($tag->posts)
        @foreach ($tag->posts as $post)
        <a href="{{ route('posts.show', array($post->id))}}" class="list-group-item"> {{ $post->title }} </a>
        @endforeach
        @else
        <a class="text-danger" href="#" class="list-group-item">
            No posts for "{{ $tag->name}}" tag
        </a>
        @endif
    </div>

</div>
</div>
@stop
