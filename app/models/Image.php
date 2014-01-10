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


}
