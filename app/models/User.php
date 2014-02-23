<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use App\Models\BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $fillable  = array('username', 'email', 'name', 'password');

	public static $rules = array(
		'username' => 'required',
		'name'     => 'required',
		'email'    => 'required|email|unique:users,NULL',
		'password' => 'required|confirmed'

		);

	public static $loginRules = array(
		'email'    => 'required',
		'password' => 'required'
		);

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function gravatarLink($size = 32, $default = 'mm')
	{
		return "http://www.gravatar.com/avatar/".md5(strtolower(trim($this->email)))."?s=$size&d=$default";
	}

}
