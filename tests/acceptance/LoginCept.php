<?php

$I = new AcceptanceTester($scenario);
//navigate to the page
$I->amOnPage('/login.php');
//Check that all the necessary text on the page is present
$I->seeLink('Automated Garage');
$I->seeLink('Register');
$I->seeLink('Log in');
$I->see('George Street Garage');
$I->see('Login here!');
$I->see('Username:');
$I->see('Password:');
$I->see('Don\'t have an account? Register');
$I->seeLink('here!');

//test the search bar
$I->click(['class' => 'search']);
$I->see('Search');

//test the pull out menu
$I->click(['class' => 'menu']);
$I->seeLink('Register');
$I->seeLink('Make a reservation');
$I->seeLink('Log in');

//Test the fields
$I->fillField('username','username');
$I->fillField('password','password');
$I->click('submit');

?>
