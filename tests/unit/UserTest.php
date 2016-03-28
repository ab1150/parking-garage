<?php

use Codeception\Util\Stub;

/* UserTests tests any functions related to uers, such as usernames */
class UserTest extends \Codeception\TestCase\UserTest {

    /* Before stub creates an instance of email for use in tests */
    protected function _before()
    {
        $user = User::create();
    }

    /* Blank after stub.
       Blank because no tasks are required after each test. */
    protected function _after()
    {
    }

    /* Tests if user variable can hold a username.
       Inputs a valid tests name.
       Passes if user variable returns a valid test name. */
    public function testValidName()   {
    	$user->username = "username";
		$this->assertTrue($user->validate(['username']));
    }

    /* Tests if user variable can identify and invalidate a null value.
       Inputs a null value.
       Passes if user variable does not consider a null value valid. */
    public function testNullName() {
		$user->username = null;
		$this->assertFalse($user->validate(['username']));
    }

    /* Tests if user variable can reject a username that is blank.
       Inputs nothing to the username field.
       Passes if user variable does not consider a blank value valid. */
    public function testBlankName() {
        $user->username = "";
		$this->assertFalse($user->validate(['username']));
    }



}
