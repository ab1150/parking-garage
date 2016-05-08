Contributors:
Anushiya Balakrishnan	Anantha Mahav	Calvin Li 	Justen Yeung 	Samuel Yang		Sean Wu



<Filename> - <description>

account.html - site structure for account page
account.php - page with account information
admin.php - access admin properties within the site
config.php - 
exit.php - page asking for exit plate number, at exit of grage
exitError.php - page that is returned when plate number invalid, requests new one
exitPayment.php - page accessed for 
exitScript.php - called upon by exit.php, processes the plate number, and payment requests
index.php - "home page" that displays current spot availability
login.php - login page for users
loginError.php - page returned for invalid logins, requests new login
loginScript.php - handles inputs to page, connects with database to verify
logout.php - page that handles logout information
main.css - main.css, handles and processes all code
parkCameraMock.php - page for taking exit of license plates at spots, deletes temp users
parkCameraMockScript.php - processes all inputs from parkCameraMock.php
parkinggarageFINAL.sql - sql database information for creating databases
plate.txt - license plate informatoin from openalpr put here
platesHandler.php - used to take in license plate information fropaeg m plate.txt
register.php - page accessed to create new account
reservation.php - page for new reservations
reservationError.php - page returned for invalid reservations, prompts to try again
reservationScript.php - handles all processing of inputs for reservation.php



<Folders> - <description>

assets - Website + CSS files
html5up-future-imperfect - Website + CSS files
images - images used in the website
tests - some of the tests used for unit testing and other tests



Running the Code

A few pre-requisites for running:
1) Download and install Xampp here : https://www.apachefriends.org/index.html
	Xampp is used as the php developing environment, that additionally hosted the sql databases.
2) Download and install Openalpr here: https://github.com/openalpr/openalpr
	Linux based version only, Openalpr is the open source software that we built our camera system off of.

Once a database is started and running the code navigate to this page:
	localhost/parking-garage/index.php

	Home page has now been reached - all things in the website can now be reached.  

		Login
			Navigate to login page, and login, test account is (username,password). 

		Make a reservation
			Navigate to the reservation page by clicking the link, set time accordingly.

Camera Functions
	enter into terminal: alprd -f 
	Needed to run program.  Read READMECAMERA.txt for more details and instructions.
	License plates should now be able to be read.

	localhost/parking-garage/parkingCameraMock.php
		Leaving spot
			System should automatically detect leaving of car, registers license plate.  Submit and system should be updated.
		Exit
			localhost/parking-garage/exit.php
			License plate iwl lbe automatically read, submit to have system be updated.  

Accounts and Passwords
<username> - <password>
username - password
richUser - password
admin - password