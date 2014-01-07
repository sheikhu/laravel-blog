{{ Form::model($post, array('method' => $method, 'route' => $route, 'class' => 'form-vertical')) }}


<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      @if (Session::has('message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error !</strong> {{ Session::get('message') }}
    </div>
    @endif
</div>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="form-group @if($errors->has('title'))has-error@endif">

        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Form::getValueAttribute('title'), ['class' => 'form-control']) }}
        {{ $errors->first('title', '<span class="help-block">:message</span>
        ') }}
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="form-group @if($errors->has('category_id'))has-error@endif">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', Category::lists('name','id'),
            Form::getValueAttribute('category_id'),
            array('class' => 'form-control'))
        }}
        {{ $errors->first('category_id', '<span class="help-block">:message</span>
        ')}}
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="form-group @if($errors->has('user_id'))has-error@endif">
        {{ Form::label('user_id', 'Author') }}
        {{ Form::select('user_id',
            User::lists('name', 'id') ,
            Form::getValueAttribute('user_id'),
            array('class' => 'form-control'))
        }}
    </div>
</div>
</div>



<div class="form-group @if($errors->has('content'))has-error@endif">
    {{ Form::label('content', 'Content') }}
    {{ Form::textarea('content', Form::getValueAttribute('content'), ['class' => 'form-control redactor']) }}
    {{ $errors->first('content', '<span class="help-block">:message</span>
    ')}}
</div>


<div class="form-group">
    {{ Form::label('tags[]', 'Tags')}}
    {{
    Form::select('tags[]', Tag::lists('name', 'id'), $post->tags->lists('id'), array('multiple' => true, 'class' => 'chosen form-control'))
    }}

</div>

{{ Form::token()}}




{{ Form::submit('Submit', ['class' => 'btn btn-info']) }}



{{ Form::close() }}
