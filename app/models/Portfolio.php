<?php

class Portfolio extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'slug' => 'required',
		'description' => 'required'
	);

    public function image()
    {
        return $this->morphOne('Image', 'owner');
    }
}
