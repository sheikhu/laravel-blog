@extends('layouts.base')

@section('container')

<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        {{ Form::open(array('method' => 'POST', 'class' => 'form-vertical'))}}
        <legend>
            <h1>
                Contactez moi
            </h1>
        </legend>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group @if($errors->has('titre'))has-error@endif">
                    {{ Form::label('titre', 'Nom')}}
                    {{ Form::text('titre', Input::old('titre'), array('class' => 'form-control', 'placeholder' => 'Titre'))}}
                    {{ $errors->first('titre', '<span class="help-block">:message</span>') }}
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group @if($errors->has('email'))has-error@endif">
                    {{ Form::label('email', 'Email')}}
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'user@domain.com'))}}
                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                </div>
            </div>
        </div>
        <div class="form-group @if($errors->has('message'))has-error@endif">
            {{ Form::label('message', 'Message')}}
            {{ Form::textarea('message', Input::old('message'), array('class' => 'form-control', 'placeholder' => 'Tapez votre message'))}}
            {{ $errors->first('message', '<span class="help-block">:message</span>') }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        {{ Form::close()}}
    </div>
</div>
@stop
