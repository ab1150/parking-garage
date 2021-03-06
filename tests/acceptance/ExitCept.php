<?php

//create the testing object
$I = new AcceptanceTester($scenario);
//navigate to the page
$I->amOnPage('/exit.php');
//Check that all the necessary text on the page is present
$I->seeLink('Automated Garage');
$I->seeLink('Log in');
$I->seeLink('Register');
$I->see('Exit Camera');

//test the search bar
$I->click(['class' => 'search']);
$I->see('Search');

//test the pull out menu
$I->click(['class' => 'menu']);
$I->seeLink('Register');
$I->seeLink('Make a reservation');
$I->seeLink('Log in');

//check if field is filled
$I->see('License Plate:');

//test the submit button
$I->click('submit');

?>
