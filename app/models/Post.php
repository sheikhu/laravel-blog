<?php

class Post extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('title', 'content', 'user_id');

	public static $rules = array(
        'title'       =>    'required:min:5',
        'content'     =>    'required|min:10',
        'user_id'     =>    'exists:users,id',
        'category_id' =>    'exists:categories,id',
        'image'       =>    'image'
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

        Post::created(function($post){

            // Attach image

            if(!Input::file('image'))
                return;

            $image = Input::file('image');

            $path = public_path() . '/uploads';

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            $fullPath = $path . '/' . $fileName;
            $success = Imager::make($image->getRealPath())
                                ->resize(300, 200)
                                ->save($fullPath);


            if($success)
            {
                $image = new Image(array(
                    'name' => $fileName ,
                    'url' => $fullPath,
                    'slug' => uniqid()
                    ));
                $post->image()->save($image);
            }
        });

        Post::saved(function($post){


            // if(File::exists($post->url))
            //     exit('ok');
            // else
            //     exit('nope');
            if(!Input::file('image'))
                return;

            $image = Input::file('image');

            $path = 'uploads';

            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $fullPath = $path . '/' . $fileName;
            $success = Imager::make($image->getRealPath())
                                ->resize(300, 200)
                                ->save(base_path() . '/public/' .$fullPath);



            if($success)
            {
                if($post->image)
                {
                    $image = $post->image;
                    if(File::exists(public_path() . '/' .$image->url))
                        File::delete(public_path() . '/' .$image->url);

                    $image->url = $fullPath;
                } else {
                $image = new Image(array(
                    'name' => $fileName ,
                    'url' => $fullPath,
                    'slug' => uniqid()
                    ));

                }

                $post->image()->save($image);
            }
        });

    }


}
