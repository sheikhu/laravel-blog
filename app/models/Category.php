<?php

class Category extends Eloquent {

    protected $guarded = array();

    protected $fillable  = array('name', 'slug');

    public $timestamps = false;

	public static $rules = array();
}
