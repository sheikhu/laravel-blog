{{ Form::model($user, array('route' => $route, 'method' => $method)) }}


<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group @if($errors->has('username')) has-error@endif">
            {{ Form::label('username', 'Username', ['class' => 'control-label']) }}
            {{ Form::bt_text('username') }}
            {{ $errors->first('username', '<span class="help-block">:message</span>
            ') }}
        </div>

    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group @if($errors->has('email')) has-error@endif">
            {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
            {{ Form::bt_text('email') }}
            {{ $errors->first('email', '<span class="help-block">:message</span>
            ') }}
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="form-group @if($errors->has('name')) has-error@endif">
            {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
            {{ Form::bt_text('name') }}
            {{ $errors->first('name', '<span class="help-block">:message</span>
            ') }}
        </div>
    </div>
</div>




<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group @if($errors->has('password')) has-error@endif">
    {{ Form::label('password', 'Mot de passe', ['class' => 'control-label']) }}
    {{ Form::password('password', ['class' => 'form-control']) }}
    {{ $errors->first('password', '<span class="help-block">:message</span>
    ') }}
</div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group @if($errors->has('password_confirmation')) has-error@endif">
    {{ Form::label('password_confirmation', 'Confirmer le mot de passe', ['class' => 'control-label']) }}
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
    {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>
    ') }}
</div>
    </div>
</div>




<div class="form-group">
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-check"></i>
        Valider
    </button>
</div>
{{ Form::close() }}
