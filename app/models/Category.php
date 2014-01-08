<?php

class Category extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('name', 'slug');

    public $timestamps = false;

    public static $rules = array(
        'name' => 'required|min:3,unique:categories'
        );

    public function posts()
    {
        return $this->hasMany('Post');
    }

    public static function boot()
    {
        parent::boot();

        Category::creating(function($category)
        {
            $category->slug = Str::slug($category->name);

        });
    }

}
