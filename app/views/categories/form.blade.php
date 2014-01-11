{{ Form::open(array('route' => $route, 'method' => $method)) }}
    <div class="form-group @if($errors->has('name')) has-error @endif">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', $category->name, array('class' => 'form-control')) }}
            {{ $errors->first('name', '<span class="help-block">:message</span>
        ') }}
    </div>
    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}

{{ Form::close() }}
