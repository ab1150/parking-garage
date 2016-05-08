<?php

$I = new AcceptanceTester($scenario);
//navigate to the page
$I->amOnPage('/parkCameraMock.php');
//Check that all the necessary text on the page is present
$I->seeLink('Automated Garage');
$I->seeLink('Register');
$I->seeLink('Log in');
$I->seeLink('Reservations');
$I->see('George Street Garage');
$I->see('Parking Reservation');
$I->see('Mock Input for a Parking Spot Sensor');
$I->see('Mock Output for a Parking Spot Sensor');
$I->see('Plate number:');
$I->see('Spot number:');
$I->see('Start Time:');

//Test the fields
$I->fillField('spotNum','105');
$I->fillField('startTime','03-03-2016 05:05:05');
$I->click('Park');

//navigate back to the page
$I->amOnPage('/parkCameraMock.php');
$I->fillField('endTime','03-04-2016 05:05:05');
$I->click('Check out');

//test the pull out menu
$I->click(['class' => 'menu']);
$I->seeLink('Register');
$I->seeLink('Make a reservation');
$I->seeLink('Log in');

?>
