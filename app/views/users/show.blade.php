@extends('layouts.scaffold')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <h1 class="entry-title"> {{ $user->name }}</h1>
    <img class="img-circle" src="{{$user->gravatarLink(128, 'mm')}}" alt="Avatar">

    <img src="" alt="">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
              <tr>
                 <td>{{{ $user->username }}}</td>
                 <td>{{{ $user->email }}}</td>
                 <td>{{{ $user->name }}}</td>

             </tr>
         </tbody>
     </table>


     {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary')) }}

     {{ link_to_route('users.edit', 'Edit Password', array($user->id), array('class' => 'btn btn-info')) }}

     {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id), 'class' => 'pull-right')) }}
     {{ Form::submit('Delete',
        array('class' => 'btn btn-danger', 'data-confirm' => 'Are you sure ?'))
    }}
    {{ Form::close() }}


</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <h1 class="entry-title">Posts</h1>

    <div class="list-group">
      @foreach ($user->posts as $post)
      <a title="show" class="list-group-item"
      href="{{ route('posts.show', array($post->id))}}">
      {{ $post->title }}
      </a>
      @endforeach
    </div>

</div>
</div>

@stop
