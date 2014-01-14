
{{ Form::open(array('method' => $method, 'route' => $route)) }}
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="form-group @if($errors->has('title')) has-error @endif">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
        {{ $errors->first('title', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group @if($errors->has('description')) has-error @endif">
        {{ Form::label('description', 'Description')}}
        {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
        {{ $errors->first('description', '<span class="help-block">:message</span>') }}
    </div>

    <div class="form-group">
        {{ Form::submit('Valider', array('class' => 'btn btn-primary')) }}
    </div>
</div>


</div>

{{ Form::close()}}

