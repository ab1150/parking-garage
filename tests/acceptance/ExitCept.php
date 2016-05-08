<?php

//create the testing object
$I = new AcceptanceTester($scenario);
//navigate to the page
$I->amOnPage('/index.php');
//Check that all the necessary text on the page is present
$I->seeLink('Automated Garage');
$I->seeLink('Log in');
$I->see('George Street Garage');
$I->see('Parking Garage Map');
$I->see('Exit');

//test the search bar
$I->click(['class' => 'search']);

//test the pull out menu
$I->click(['class' => 'menu']);

//test submit
$I->click(['class' => 'submit']);
?>
