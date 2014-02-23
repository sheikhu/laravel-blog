<?php

class Post extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('title', 'content', 'user_id');

    protected $softDelete = true;

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
}
