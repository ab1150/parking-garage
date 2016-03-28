<?php

use Codeception\Util\Stub;

/* emailTest verifies functionality of the email field */
class emailTest extends \Codeception\TestCase\emailTest {

    /* Before stub creates an instance of email for use in tests */
    protected function _before()
    {
        $email = Email::create();
    }

    /* Blank after stub.
       Blank because no tasks are required after each test. */
    protected function _after()
    {
    }

    /* Tests if email field can accept a valid email.
       Inputs a valid email.
       Passes if valid email is returned when validate is run. */
    public function testValidName()   {
    	$email->emailname= "emailTest@gmail.com";
		$this->assertTrue($email->validate(['emailname']));
    }

    /* Tests if email field can identify and invalidate a null value.
       Inputs a null value to email field.
       Passes if email field is invalidated. */
    public function testNullName() {
		$email->emailname = null;
		$this->assertFalse($email->validate(['emailname']));
    }

    /* Tests if email field can identify and invalidate an email without an @ symbol.
       Inputs an email without an @ symbol.
       Passes if email field is declared invalided. */
    public function testNoAt() {
        $email->emailname = "emailTestgmail.com";
		$this->assertFalse($email->validate(['emailname']));
    }

    /* Tests if email field can identify and invalidate an email without a domain.
       Inputs an email without a domain.
       Passes if email field is declared invalidated. */
    public function testNoDomain(){
        $email->emailname = "emailtest@";
        $this->assertFalse($email->validate['emailname']);
    }



}
