<?php

class Image extends Eloquent {
	protected $guarded = array();

    protected $fillable = array('name', 'slug', 'url');

	public static $rules = array(

        );

    public function imageable()
    {
        return $this->morphTo('owner');
    }

    public function path()
    {
        return Config::get('settings.publicUploadPath') . '/' . $this->name;
    }

    public function getRootPath()
    {
        return Config::get('settings.uploadPath') . '/' . $this->name;
    }

    public function webPath()
    {
        return $this->path();
    }


}
