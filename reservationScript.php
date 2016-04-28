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
	if(isset($_POST["submit"])){
		//Find available reservation spot and create if available, return error if unavailable
		//We want all reservations where startime is between in and out AND/OR endtime is between in and out
		$findSlot = $databaseConnection->prepare('INSERT INTO unavTab SELECT * FROM reservations WHERE (startTime BETWEEN :inTime AND :out) OR (endTime between :inTime AND :out) OR ((startTime < :inTime) AND (endTime > :inTime))');
		$findSlot->bindParam(':inTime',$_POST['startTime']);
		$findSlot->bindParam(':out',$_POST['endTime']);
		$findSlot->execute();

		$avTab = $databaseConnection->prepare('SELECT SpotNum FROM unavTab FULL JOIN parkingspaces ON SpotNum = parkingspaces.SpotNumber WHERE SpotNum = NULL OR parkingspaces.SpotNumber = NULL');
		$avTab->execute();

		//Input the FROM time to the SQL database

		//Prepare the SQL commands
		$user = $_SESSION['username'];
		$writeTime = $databaseConnection->prepare("UPDATE accounts SET Reservation = :fromTime WHERE Username = :username");
		$writeTime->bindParam(':fromTime', $_POST["startTime"]);
		$writeTime->bindParam(':username', $user);
		$writeTime->execute();
		/*$goodSpot = $writeTime->fetch();

		$writeTime = $databaseConnection->prepare('INSERT INTO reservations (startTime,endTime, SpotNumber, username);
			VALUES (:startTime, :endTime, :SpotNumber, :username)');
		$writeTime->bindParam(':startTime', $_POST['startTime']);
		$writeTime->bindParam(':endTime', $_POST['endTime']);
		$writeTime->bindParam(':SpotNumber', $goodSpot);
		$writeTime->bindParam(':username', $user);
		$writeTime->execute();*/
		
		header("Location: account.php");
	}
?>
