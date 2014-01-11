@extends('layouts.scaffold')

@section('content')

<h1 class="entry-title">Medias</h1>

@if (!empty($photos))
@foreach (array_chunk($photos->all(), 4) as $list)
<div class="row">
    @foreach ($list as $photo)
    <div class="col-xs-6 col-md-3">
        <!-- <a href="{{ asset($photo->url) }}" class="thumbnail">
        <img data-src="{{ asset($photo->url) }}" alt="{{ $photo->name}}" src="{{ asset($photo->url)}}">
      </a>
      <p style="text-align:center">
        <div class="btn-group">
            <a href="{{ asset($photo->url) }}" class="btn btn-primary btn-sm" role="button" title="Aperçu">
        <i class="fa fa-eye"></i>
        </a>
        <a href="#" class="btn btn-danger btn-sm" role="button" title="Delete">
            <i class="fa fa-trash-o"></i>
        </a>


        </div>
        </p> -->
      <div class="thumbnail">
      <img data-src="holder.js/300x200" alt="..." src="{{ asset($photo->url) }}">
      <div class="caption">
        <h5>{{ $photo->name }}</h5>
        <p>
        <a href="{{ asset($photo->url) }}" class="btn btn-primary btn-sm" role="button" title="Aperçu">
        <i class="fa fa-eye"></i>
        </a>
        <a href="#" class="btn btn-danger btn-sm" role="button" title="Delete">
            <i class="fa fa-trash-o"></i>
        </a></p>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endforeach

@endif

@stop
