<?php

class UserTest extends TestCase {
	public function testThatTrueIsTrue()
	{
		$this->assertTrue(true);
	}

	/**
	 * Username is required
	 */
	public function testUsernameIsRequired()
	{
		// Create a new user
		$user = new User;
		$user->email = "test@gmail.com";
		$user->password = "testpassword";
		$user->password_confirmation = "testpassword";

		// User should not save
		$this->assertFalse($user->save());

		// Save the errors
		$errors = $user->errors()->all();

		// There should only be 1 error
		$this->assertCount(1, $errors);

		// The username error should be set
		$this->assertEquals($errors[0], "The username field is required.");
	}
}