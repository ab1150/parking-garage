<?php

use Codeception\Util\Stub;

class UserTest extends \Codeception\TestCase\UserTest {

    protected function _before()
    {
        $user = User::create();
    }

    protected function _after()
    {
    }

    public function testValidName()   {

    	$user->username = "username";
		$this->assertTrue($user->validate(['username']));
    }

    public function testNullName() {
		$user->username = null;
		$this->assertFalse($user->validate(['username']));
    }

    public function testLongName() {
        $user->username = "tooooolooooooonnnnnnnnnnngggname";
		$this->assertFalse($user->validate(['username']));
    }



}
