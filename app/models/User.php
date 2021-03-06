<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 */
	protected $hidden = array('password');

	/**
     * Columns that can be mass assigned
     */
    protected $fillable = array('username', 'email');

    /**
     * Prevents the listed columns from mass assignment
     */
    protected $guarded = array('id', 'password');

    /**
	 * Ardent validation rules
	 */
	public static $rules = array(
		'username' => 'required|between:4,16',
		'email' => 'required|email',
		'password' => 'required|alpha_num|min:8|confirmed',
		'password_confirmation' => 'required|alpha_num|min:8',
	);

	/** 
	 * Factory
	 */
	public static $factory = array(
		'username' => 'string',
		'email' => 'email',
		'password' => 'password',
		'password_confirmation' => 'password',
	);

	/**
	 * Purge confirmation fields
	 */
	public $autoPurgeRedundantAttributes = true;

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

	/**
	 * Post relationship
	 */
	public function posts()
	{
		return $this->hasMany('Post');
	}

}
