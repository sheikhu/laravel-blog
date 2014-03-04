<div class="blog-post">
    <h1 class="blog-post-title">
        <a href="{{ route('blog.show', $post->slug)}}">
            {{ $post->title }}
        </a>
    </h1>
    <p class="blog-post-meta">
        {{ date(' d-m-Y', $post->created_at->timestamp) }} by
        <a href="{{ route('show_by_author', $post->user->username)}}"><span class="label label-info">{{ $post->user->name }}</span></a>
    </p>
    <div class="row">

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <i class="fa fa-paperclip"></i>
            <a href="{{ route('show_by_category', $post->category->slug)}}">{{ $post->category->name}}</a>
        </div>


        <p class="pull-right">
            @if(count($post->tags))
            <i class="fa fa-tags"></i>
            @foreach ($post->tags as $tag)
            <a class="no-decoration" href="{{ route('show_by_tag', $tag->slug) }}">
                <span class="label label-info">{{ $tag->name }}</span>
            </a>
            @endforeach
            @endif
        </p>
    </p>
</div>

<p class="justify">
    {{ Str::words($post->content, 50) }}
</p>

<p>
    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-arrow-right"></i>
    Read more
    </a>
</p>

</div><!-- /.blog-post -->

