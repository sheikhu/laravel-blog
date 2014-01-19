{{ Form::open(array('route' => $route, 'method' => $method)) }}
    <div class="form-group @if($errors->has('name')) has-error @endif">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $category->name, array('class' => 'form-control')) }}
            {{ $errors->first('name', '<span class="help-block">:message</span>
        ') }}
    </div>

    <button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i> Valider
    </button>

{{ Form::close() }}
