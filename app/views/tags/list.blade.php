<h1>Tags</h1>

<p>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        New tag
    </a>

</p>

@if ($tags->count())
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tags as $tag)
            <tr>
                <td>{{{ $tag->name }}}</td>
                <td>{{{ $tag->slug }}}</td>

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
                        <li>
                        {{ link_to_route('tags.show', 'Voir',array($tag->id)) }}
                        </li>
                        <li>
                        {{ link_to_route('tags.edit', 'Edit',array($tag->id)) }}
                        </li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
There are no tags
@endif
