<?php

class Tag extends Eloquent {

    protected $guarded = array();

	public static $rules = array(
            'name'  =>  'required|unique:tags'
        );

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany('Post');
    }

    public static function boot()
    {
        parent::boot();

        Tag::saving(function($tag){
            $tag->slug = Str::slug($tag->name);
        });
    }
}
