    <h1 class="entry-title">Categories</h1>

    <p>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            New Category
        </a>

        <a href="#" class="btn btn-danger">
            <i class="fa fa-trash-o"></i>
            Trash
        </a>

    </p>
    @if ($categories->count())
    <div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{{ $category->name }}}</td>
                <td>{{ $category->slug }}</td>
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
                        <li>{{ link_to_route('categories.show', 'Voir', array($category->id)) }}</li>
                        <li>{{ link_to_route('categories.edit', 'Edit', array($category->id)) }}</li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('categories.destroy', $category->id), 'class' => 'hide', 'id' => 'category_'.$category->id)) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

@else
There are no categories
@endif


