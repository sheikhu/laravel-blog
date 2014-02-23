<?php

use App\Models\BaseModel;

class Contact extends BaseModel {

	protected $guarded = array();

	public static $rules = array(
        'name'    =>  'required',
        'email'   =>  'required|email',
        'message' => 'required'
        );



}
