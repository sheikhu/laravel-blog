@extends('layouts.scaffold')

@section('content')

<h1>All Portfolios</h1>

<p>{{ link_to_route('portfolios.create', 'Add new portfolio') }}</p>

@if ($portfolios->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Slug</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($portfolios as $portfolio)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no portfolios
@endif

@stop
