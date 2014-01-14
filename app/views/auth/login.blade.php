@extends('layouts.base')


@section('container')

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3">
        <form action="" method="POST" role="form" class="form-horizontal">
            <legend>

                <h1><span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span>Login</h1>
            </legend>

            @if (Session::has('message'))
                <div class="form-group">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error !</strong> {{ Session::get('message')}}
                </div>
            </div>
            @endif

            <div class="form-group @if($errors->has('username')) has-error@endif">
                {{ Form::label('username', 'Username')}}
                {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
                {{ $errors->first('username', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group @if($errors->has('password')) has-error@endif">
                {{ Form::label('password', 'Password')}}
                {{ Form::password('password', array('class' => 'form-control')) }}
                {{ $errors->first('password', '<span class="help-block">:message</span>') }}
            </div>

            <div class="form-group">
                {{ Form::checkbox('remember')}}
                {{ Form::label('remember', 'Remember me ?')}}
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fa fa-check"></i> Login
            </button>

            </div>
        </form>
    </div>
</div>
@stop

@section('footer')
@stop
