<?php

//create the testing object
$I = new AcceptanceTester($scenario);
//navigate to the page
$I->amOnPage('/index.php');
//Check that all the necessary text on the page is present
$I->seeLink('Automated Garage');
$I->seeLink('Register');
$I->seeLink('Log in');
$I->seeLink('Reservations');
$I->see('George Street Garage');
$I->see('Group 6: Anushiya Balakrishnan, Calvin Li, Anantha Mahavrathayajula, Sean Wu, Sam Yang, Justen Yeung ');
$I->see('Parking Garage Map');
$I->see('Available');
$I->see('All Spots');

//test the search bar
$I->click(['class' => 'search']);

//test the pull out menu
$I->click(['class' => 'menu']);
$I->seeLink('Register');
$I->seeLink('Make a reservation');
$I->seeLink('Log in');

?>
