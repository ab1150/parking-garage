<?php
//This is the handler script for creating reservations

//start session
session_start();

	//DB configuration Constants
	define('_HOST_NAME_', 'localhost');
	define('_USER_NAME_', 'root');
	define('_DB_PASSWORD', '');
	define('_DATABASE_NAME_', 'parkinggarage');

	//PDO Database Connection
	try {
		$databaseConnection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
		$databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo 'ERROR: '. $e->getMessage();
	}

	if(isset($_POST["submit"])) {


	//Find available reservation spot and create if available, return error if unavailable
	//We want all reservations where startime is between in and out AND/OR endtime is between in and out
	$findSlot = $databaseConnection->prepare("SELECT * FROM reservations WHERE (startTime BETWEEN :in AND :out) OR (endTime between :in AND :out)");
	$findSlot->bindParam(':in',$_POST["startTime"]);
	$findSlot->bindParam(':out',$_POST["endTime"]);
	$findSlot->execute();

	//Input the FROM time to the SQL database

	//Prepare the SQL commands
	$user = $_SESSION['username'];
	$writeTime = $databaseConnection->prepare("UPDATE accounts SET Reservation = :fromTime WHERE Username = :username");
	$writeTime->bindParam(':fromTime', $_POST["startTime"]);
	$writeTime->bindParam(':username', $user);
	$writeTime->execute();

	header("Location: account.php");
	}
?>
