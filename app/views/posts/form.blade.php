{{ Form::model($post, array('files' => true, 'method' => $method, 'route' => $route, 'class' => 'form-vertical')) }}


<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="form-group @if($errors->has('title')) has-error@endif">

        {{ Form::label('title', 'Title', ['class' => 'control-label']) }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
        {{ $errors->first('title', '<span class="help-block">:message</span>
        ') }}
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="form-group @if($errors->has('category_id'))has-error@endif">
        {{ Form::label('category_id', 'Category', ['class' => 'control-label']) }}
        {{ Form::select('category_id', Category::lists('name','id'),
            null,
            array('class' => 'form-control'))
        }}
        {{ $errors->first('category_id', '<span class="help-block">:message</span>
        ')}}
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="form-group @if($errors->has('user_id'))has-error@endif">
        {{ Form::label('user_id', 'Author', ['class' => 'control-label']) }}
        {{ Form::select('user_id',
            User::lists('name', 'id') ,
            null,
            array('class' => 'form-control'))
        }}
    </div>
</div>
</div>

<div class="form-group @if($errors->has('content'))has-error@endif">
    {{ Form::textarea('content', null, ['class' => 'form-control redactor']) }}
    {{ $errors->first('content', '<span class="help-block">:message</span>
    ')}}
</div>


<div class="form-group">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{ Form::label('tags[]', 'Tags', ['class' => 'control-label'])}}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{
        Form::select('tags[]', Tag::lists('name', 'id'), $post->tags->lists('id'), array('multiple' => true, 'class' => 'chosen form-control'))
    }}
    </div>
</div>
</div>


<div class="form-group @if($errors->has('image'))has-error@endif">
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {{ Form::label('image', 'Image', ['class' => 'control-label'])}}
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
        {{ Form::file('image')}}
        </div>
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">

    @if(!is_null($post->image) and !empty($post->image->path()))
        <a href="#" class="thumbnail">
            <img src="{{ asset($post->image->path()) }}" data-src="#" alt="">
        </a>
    @endif
    </div>
    </div>
    {{ $errors->first('image', '<span class="help-block">:message</span>
            ')}}
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">
    <i class="fa fa-check"></i> Valider
    </button>
</div>



{{ Form::token()}}


{{ Form::close() }}
