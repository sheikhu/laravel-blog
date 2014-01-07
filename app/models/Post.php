<?php

class Post extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('title', 'content', 'user_id');

	public static $rules = array(
        'title'       =>    'required:min:5',
        'content'     =>    'required|min:10',
        'user_id'     =>    'exists:users,id',
        'category_id' =>    'exists:categories,id'
	);


    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public static function boot()
    {
        parent::boot();

        Post::creating(function($post)
        {
            $post->slug = Str::slug($post->title);

            $count = Post::whereSlug($post->slug)->count();

            if($count > 0)
                $post->slug = $post->slug .= ($count + 1);

        });
    }
}
