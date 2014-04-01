<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class Post extends Ardent {
 
	protected $fillable = array('body');

	/**
	 * Ardent validation rules
	 */
	public static $rules = array(
		'user_id' => 'required',
		'body' => 'required'
	);

	/**
	 * Factory
	 */
	public static $factory = array(
		'user_id' => 'factory|User',
		'body' => 'text'
	);
 
	public function user()
	{
		return $this->belongsTo('User');
	}
   
}