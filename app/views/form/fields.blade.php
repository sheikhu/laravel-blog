<?php $options = $field->getOptions();?>
<?php $type = $field->getType();?>
<?php $name =  $field->getName(); ?>

@if($type == 'text')
    @section('text')
        <div class="form-group @if($errors->has('title'))has-error@endif">

            {{ Form::label($name, $options['label']) }}
            {{ Form::text($name, $options['value'], ['class' => 'form-control']) }}
            {{ $errors->first($name, '<span class="help-block">:message</span>
            ')}}
        </div>
    @stop
@endif

@if ($type == 'textarea')
    @section('textarea')
    <div class="form-group @if($errors->has($name))has-error@endif">
    {{ Form::label($name, $options['label']) }}
    {{ Form::textarea($name, $options['value'], ['class' => 'form-control redactor']) }}
    {{ $errors->first($name, '<span class="help-block">:message</span>
    ')}}
    </div>
@stop
@endif

@if ($type == 'select')

    @section('select')
        <div class="form-group @if($errors->has($name))has-error@endif">
        {{ Form::label($name, $options['label']) }}
        {{ Form::select($name, $options['query_builder'](),$options['value'], ['class' => 'form-control']) }}
        </div>
    @stop

@endif
