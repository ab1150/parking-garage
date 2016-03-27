<?php
class UserTest extends \Codeception\TestCase\UserTest{
	public function testValidation(){
		$user = User::create();

		$user->username = null;
		$this->assertFalse($user->validate(['username']));

		$user->username = "tooooolooooooonnnnnnnnnnngggname";
		$this->assertFalse($user->validate(['username']));

		$user->username = "username";
				$this->assertTrue($user->validate(['username']));
	}
}