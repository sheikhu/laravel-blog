<h1 class="entry-title">Posts</h1>


<p>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        New Post
    </a>

    <a href="#" class="btn btn-danger">
        <i class="fa fa-trash-o"></i>
        Trash
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
                <th>Last Update</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{{ Str::words($post->title, 6) }}}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->name }}</td>
                <td> {{ date('d-m-Y', $post->updated_at->timestamp)}} </td>
                <td>

                <div class="btn-group">
                    {{ link_to_route('posts.show', 'Voir', array($post->id), array('class' => 'btn btn-info btn-sm')) }}
                    {{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) }}
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

{{ $posts->links()}}
@else
There are no posts
@endif


