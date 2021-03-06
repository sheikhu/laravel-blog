<div id="sidebar" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      <div>
        <h3 class="text-center">Categories</h3>
        <ul class="nav nav-pills nav-stacked">
          @foreach ($categories as $category)
          <?php $count = count($category->posts) ?>
          <li>
            <a href="{{ route('show_by_category', $category->slug) }}">
              <span class="badge pull-right">{{ count($category->posts) }}</span>
              {{ $category->name }}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
      <div>
        <h3 class="text-center">Tags</h3>
        <ul class="nav nav-pills nav-stacked">
          @foreach ($tags as $tag)
          <?php $count = count($tag->posts) ?>

            <li>
            <a href="{{ route('show_by_tag', $tag->slug) }}">
              <span class="badge pull-right">{{ $count }}</span>
              {{ $tag->name }}
            </a>
          </li>

          @endforeach
        </ul>
      </div>
    </div>
