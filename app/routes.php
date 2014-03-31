<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/user', function()
{
	$user = new User;
	$user->username = 'cfalzone';
	$user->email = 'ctiggerf@gmail.com';
	$user->password = 'password';
	$user->password_confirmation = 'password';
	var_dump($user->save());
});

Route::get('/post', function()
{
	// Create a new Post
	$post = new Post(array('body' => 'My First Post'));
	// Grab User 1
	$user = User::find(1);
	// Save the Post
	$user->posts()->save($post);
});