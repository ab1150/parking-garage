<?php

use Codeception\Util\Stub;

class emailTest extends \Codeception\TestCase\emailTest {

    protected function _before()
    {
        $email = Email::create();
    }

    protected function _after()
    {
    }

    public function testValidName()   {

    	$email->emailname= "emailTest@gmail.com";
		$this->assertTrue($email->validate(['emailname']));
    }

    public function testNullName() {
		$email->emailname = null;
		$this->assertFalse($email->validate(['emailname']));
    }

    public function testNoAt() {
        $email->emailname = "emailTestgmail.com";
		$this->assertFalse($email->validate(['emailname']));
    }

    public function testNoDomain(){
        $email->emailname = "emailtest@";
        $this->assertFalse($email->validate['emailname']);
    }



}
