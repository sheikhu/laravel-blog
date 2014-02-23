<div class="blog-post">
    <h1 class="blog-post-title entry-title">
        {{ $post->title }}
        @if (Auth::check())
            <small> <a href="{{ route('posts.edit', [$post->id] )}}">Edit</a> </small>
        @endif
    </h1>
    <p class="blog-post-meta">
        <i class="fa fa-calendar"></i>
        {{ date('m d, Y', $post->created_at->timestamp) }} by
        <span class="label label-info">
            {{ $post->user->name }}
        </span>
    </p>
    <div class="row">

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            Category <i class="fa fa-arrow-circle-right"></i>
            <a href="{{ route('show_by_category', $post->category->slug)}}">
            <span class="badge">{{ $post->category->name }}</span>
            </a>
        </div>

        <p class="pull-right">
            @if($post->tags)
            Tags <i class="fa fa-arrow-circle-right"></i>
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
