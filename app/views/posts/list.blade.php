    <h1>Posts</h1>

    <p>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Post
        </a>

        <a href="#" class="btn btn-danger">
            <i class="fa fa-trash-o"></i>
            Deleted
        </a>

    </p>
    @if ($posts->count())
    <div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Last Update</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{{ $post->title }}}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td> {{ date('d-m-Y', $post->created_at->timestamp)}} </td>
                <td> {{ date('d-m-Y', $post->updated_at->timestamp)}} </td>
                <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary">Action</button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('posts.show', 'Voir', array($post->id)) }}</li>
                        <li>{{ link_to_route('posts.edit', 'Edit', array($post->id)) }}</li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id), 'class' => 'hide', 'id' => 'post_'.$post->id)) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

@else
There are no posts
@endif


