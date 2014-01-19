{{ Form::open(array('route', route('contact'), 'method' => 'POST', 'class' => 'form-vertical'))}}
        <legend>

                <h1><span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                </span>Contactez moi !</h1>
            </legend>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group @if($errors->has('name'))has-error@endif">
                    {{ Form::label('name', 'Nom')}}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'John Doe'))}}
                    {{ $errors->first('name', '<span class="help-block">:message</span>') }}
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group @if($errors->has('email'))has-error@endif">
                    {{ Form::label('email', 'Email')}}
                    {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'user@domain.com'))}}
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
