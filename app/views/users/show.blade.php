@extends('layouts.scaffold')

@section('content')
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <h1 class="entry-title"> {{ $user->name }}</h1>

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


     {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}

     {{ link_to_route('users.edit', 'Edit Password', array($user->id), array('class' => 'btn btn-warning')) }}

     {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id), 'class' => 'pull-right')) }}
     {{ Form::submit('Delete',
        array('class' => 'btn btn-danger', 'data-confirm' => 'Are you sure ?'))
    }}
    {{ Form::close() }}


</div>

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <h1 class="entry-title">Posts</h1>

    <div class="table-responsive">
        @if ($user->posts)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a title="show" class="btn btn-default" href="{{ route('posts.show', array($post->id))}}">

                            <i class="fa fa-search"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
</div>

@stop
