@if(Session::has('messages'))
    @foreach (array('success', 'warning', 'danger') as $type)
        @foreach(Session::get('messages')->get($type) as $message)
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="alert alert-{{$type}} fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ Str::title($type) }} !</strong> {{ $message }}
            </div>
              </div>
          </div>
      @endforeach
    @endforeach
@endif
