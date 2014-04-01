<?php
use Zizaco\FactoryMuff\Facade\FactoryMuff;
class PostTest extends TestCase {
	/** 
	 * Test relationship with User
	 */
	public function testRelationshipWithUser()
	{
		// Make a new post
		$post = FactoryMuff::create('Post');

		$this->assertEquals($post->user_id, $post->user->id);
	}

	/**
	 * Test the user_id is required
	 */
	public function testUserIdIsRequired()
	{
		// Create new post without a user
		$post = new Post;
		$post->body = "test post";

		// Post should not save
		$this->assertFalse($post->save());

		// Save the errors
		$errors = $post->errors()->all();

		// There should be 1 error
		$this->assertCount(1, $errors);

		// The error should be set
		$this->assertEquals($errors[0], "The user id field is required.");
	}

	/**
	 * That that body is required
	 */
	public function testBodyIsRequired()
	{
		// Create new post without a user
		$post = new Post;

		// Create a user
		$user = FactoryMuff::create('User');

		// Post should not save
		$this->assertFalse($user->posts()->save($post));

		// Save the errors
		$errors = $post->errors()->all();

		// There should be 1 error
		$this->assertCount(1, $errors);

		// The error should be set
		$this->assertEquals($errors[0], "The body field is required.");
	}

	/**
	 * Test Post saves correctly
	 */
	public function testPostSavesCorrectly()
	{
		// Make a new post
		$post = FactoryMuff::create('Post');

		// Save the post
		$this->assertTrue($post->save());
	}
}