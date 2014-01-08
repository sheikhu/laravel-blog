    <h1 class="entry-title">Users</h1>

    <p>

        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New User
        </a>

        <a href="#" class="btn btn-danger">
            <i class="fa fa-trash-o"></i>
            Deleted users
        </a>

    </p>
    @if ($users->count())
    <div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{{ $user->name }}}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary">
                      <i class="fa fa-cogs"></i>
                      </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('users.show', 'Voir', array($user->id)) }}</li>
                        <li>{{ link_to_route('users.edit', 'Edit', array($user->id)) }}</li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id), 'class' => 'hide', 'id' => 'user_'.$user->id)) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

@else
There are no users
@endif


