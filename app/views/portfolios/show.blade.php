@extends('layouts.scaffold')

@section('content')

<h1>Show Portfolio</h1>

<p>{{ link_to_route('portfolios.index', 'Return to all portfolios') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Title</th>
				<th>Slug</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $portfolio->title }}}</td>
					<td>{{{ $portfolio->slug }}}</td>
					<td>{{{ $portfolio->description }}}</td>
                    <td>{{ link_to_route('portfolios.edit', 'Edit', array($portfolio->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('portfolios.destroy', $portfolio->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
