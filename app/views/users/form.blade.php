{{ Form::model($user, array('route' => $route, 'method' => $method)) }}



    <div class="form-group @if($errors->has('username')) has-error@endif">
        {{ Form::label('username', 'Username') }}
        {{ Form::bt_text('username') }}
        {{ $errors->first('username', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group @if($errors->has('email')) has-error@endif">
        {{ Form::label('email', 'Email') }}
        {{ Form::bt_text('email') }}
        {{ $errors->first('email', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group @if($errors->has('name')) has-error@endif">
        {{ Form::label('name', 'Name') }}
        {{ Form::bt_text('name') }}
        {{ $errors->first('name', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group @if($errors->has('password')) has-error@endif">
        {{ Form::label('password', 'Mot de passe') }}
        {{ Form::password('password', ['class' => 'form-control']) }}
        {{ $errors->first('password', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group @if($errors->has('password_confirmation')) has-error@endif">
        {{ Form::label('password_confirmation', 'Confirmer le mot de passe') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>
        ') }}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">
        <i class="fa fa-check"></i>
        Valider
        </button>
    </div>
{{ Form::close() }}
