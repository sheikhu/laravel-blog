@extends('layouts.base')


@section('container')

<div class="row">
    {{ HTML::col(4, 4)}}
    <form action="" method="POST" role="form" class="form-horizontal">


        <div class="form-group">
            <h1>
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                Login
            </h1>
        </div>


        @if (Session::has('message'))
        <div class="form-group">
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error !</strong> {{ Session::get('message')}}
            </div>
        </div>
        @endif

        <div class="form-group @if($errors->has('email')) has-error@endif">
            {{ Form::label('email', 'Email')}}
            {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
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
        {{ Form::token() }}
    </form>
    {{ HTML::end_col()}}
</div>
@stop

@section('footer')
@stop
