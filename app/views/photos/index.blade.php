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
        <div class="panel panel-info no-rounded img-container">
        <div class="panel-heading">
          <i class="fa fa-picture-o"></i>
          {{ $photo->name }}
        </div>
        <div class="panel-body justify no-padding">
          <a href="{{ asset($photo->url) }}" class="thumbnail">
            <img data-src="{{ asset($photo->url) }}" alt="..." src="{{ asset($photo->url) }}">
          </a>
        </div>
        <div class="panel-footer">
          <div class="btn-group">
            <a href="{{ asset($photo->url) }}" class="fa fa-search btn btn-success"></a>
            <button type="button" class="fa fa-ban btn btn-default"></button>
          </div>
          <i style="display:none;" class="loader fa fa-spin fa-spinner"></i>
          {{ Form::open(array('class' => 'pull-right', 'method' => 'DELETE', 'route' => array('photos.destroy', $photo->id)))}}
          <button type="submit" class="btn btn-danger btn-sm delete-image" role="button" title="Delete">
            <i class="fa fa-trash-o"></i>
          </button>


        {{ Form::close()}}

        </div>
      </div>

  </div>
  @endforeach
</div>

@endforeach

@endif

@stop


@section('scripts')
  @parent

  <script>
  $(function() {

    $(document).ajaxStart(function(event) {
      console.log(event);
      $(event.delegateTarget.activeElement).parent('form')
              .parents('.img-container')
              .find('.loader')
              .show();
    });

    $('.delete-image').on('click', function(e){
      e.preventDefault();
      var $this = $(this);

      var $form = $this.parent('form');

      var params = $form.serialize();

      $.post($form.attr('action'), params, function(data, textStatus, xhr) {
        if(data.status == true)
            $form.parents('.img-container').parent('div').fadeOut();
      }).fail(function(e){
        alert('Erreur !');
      });

    });
  });
  </script>
@endsection
