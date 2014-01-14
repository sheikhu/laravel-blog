<div class="blog-post">
    <h1 class="blog-post-title">
        <a href="{{ route('blog.show', $post->slug)}}">
            {{ $post->title }}
        </a>
    </h1>
    <p class="blog-post-meta">
        {{ date('m d, Y', $post->created_at->timestamp) }} by <a href="#">{{ $post->user->name }}</a>
    </p>
    <div class="row">

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <i class="fa fa-paperclip"></i>
            <a href="{{ route('show_by_category', $post->category->slug)}}"><span class="label label-info">{{ $post->category->name}}</span></a>
        </div>


        <p class="pull-right">
            @if($post->tags)
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
    {{ $post->content }}
</p>
</div><!-- /.blog-post -->
