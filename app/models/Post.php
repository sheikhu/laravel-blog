<?php

class Post extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('title', 'content', 'user_id');

	public static $rules = array(
        'title'       =>    'required:min:5',
        'content'     =>    'required|min:10',
        'user_id'     =>    'exists:users,id',
        'category_id' =>    'exists:categories,id',
        'image'       =>    'image, mimes:jpeg,png,jpg'
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
        return $this->morphToMany('Tag', 'taggable');
    }

    public function image()
    {
        return $this->morphOne('Image', 'owner');
    }

    public static function boot()
    {
        parent::boot();

        Post::saved(function($post){

            $tags = array_values(Input::get('tags', array()));

            $post->tags()->sync($tags);

        });

        Post::creating(function($post)
        {
            $post->slug = Str::slug($post->title);

            $count = Post::whereSlug($post->slug)->count();

            if($count > 0)
                $post->slug = $post->slug .= ($count + 1);

            $category = Category::find(Input::get('category_id'));

            // Attach category
            $post->category()->associate($category);


        });

        Post::saved(function($post){

            // Attach image

            if(!Input::file('image'))
                return;

            $image = Input::file('image');

            $path = public_path() . '/uploads';

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            $success = $image->move($path, $fileName);

            if($success)
            {
                $image = new Image(array(
                    'name' => uniqid() ,
                    'url' => $fileName,
                    'slug' => uniqid()
                    ));
                $post->image()->save($image);
            }
        });



    }
}
