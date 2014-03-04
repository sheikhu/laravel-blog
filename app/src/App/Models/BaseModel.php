<?php
namespace App\Models;

use Eloquent, Validator;

class BaseModel extends Eloquent
{

    public $errors;

    public static $rules = array();

    public static function boot()
    {
        parent::boot();

        static::saving(function($model){
            return $model->validate();
        });

    }


    public function validate()
    {
        $validation = Validator::make($this->getAttributes(), static::$rules);


        if($validation->passes())
            return true;

        $this->errors = $validation->errors();

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        return $this->validate();
    }
}

 ?>
