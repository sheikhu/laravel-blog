<div class="blog-post">
    <h1 class="blog-post-title entry-title">
    <a href="{{ action('HomeController@showPost', $post->slug)}}">
        {{ $post->title }}
    </a>
    </h1>
    <p class="blog-post-meta">
        {{ date('m d, Y', $post->created_at->timestamp) }} by <a href="#">{{ $post->user->name }}</a>
    </p>
    <div class="row">

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            Category <i class="fa fa-arrow-circle-right fa-border"></i>
            <span class="badge">{{ $post->category->name}}</span>
        </div>

        <p class="pull-right">
            @if($post->tags)
            Tags <i class="fa fa-arrow-circle-right fa-border"></i>
            @foreach ($post->tags as $tag)
            <span class="label label-info">{{ $tag->name }}</span>
            @endforeach
            @endif
        </p>
    </p>
</div>



<p class="justify">
    {{ $post->content }}
</p>
</div><!-- /.blog-post -->
