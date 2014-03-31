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
 
	public function user()
	{
		return $this->belongsTo('User');
	}
   
}