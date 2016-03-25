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
	//Assign the values recieved from reservation.php to variables
	$inMonth = htmlspecialchars($_POST['inMonth']);
	$inDay = htmlspecialchars($_POST['inDay']);
	$inYear = htmlspecialchars($_POST['inYear']);
	$inHour = htmlspecialchars($_POST['inHour']);
	$inMinute = htmlspecialchars($_POST['inMinute']);
	$outMonth = htmlspecialchars($_POST['outMonth']);
	$outDay = htmlspecialchars($_POST['outDay']);
	$outYear = htmlspecialchars($_POST['outYear']);
	$outHour = htmlspecialchars($_POST['outHour']);
	$outMinute = htmlspecialchars($_POST['outMinute']);
	$inDaytime = htmlspecialchars($_POST['inDaytime']);
	$outDaytime = htmlspecialchars($_POST['outDaytime']);
	
	//convert to datetime format
	$AM = "AM";
	$PM = "PM";

	//convert the FROM time
	str_pad($inMinute,2,"0",STR_PAD_LEFT);
	if (strcmp($inDaytime,$AM) == 0 )	{
		if ($inHour == 12)	{
			$in = $inYear."-".$inMonth."-".$inDay." 00:".$inMinute.":00";			
		}
		else{
			str_pad($inHour,2,"0",STR_PAD_LEFT);
			$in = $inYear."-".$inMonth."-".$inDay." ".$inHour.":".$inMinute.":00";
		}		
	}
	else {	
		if ($inHour == 12)	{
			$in = $inYear."-".$inMonth."-".$inDay." ".$inHour.":".$inMinute.":00";
		}
		else {
			$in = $inYear."-".$inMonth."-".$inDay." ".($inHour+12).":".$inMinute.":00";	
		}
	}

	//convert the TO time
	str_pad($outMinute,2,"0",STR_PAD_LEFT);
	if (strcmp($outDaytime,$AM) == 0 )	{
		if ($outHour == 12)	{
			$out = $outYear."-".$outMonth."-".$outDay." 00:".$outMinute.":00";			
		}
		else{
			str_pad($inHour,2,"0",STR_PAD_LEFT);
			$out = $outYear."-".$outMonth."-".$outDay." ".$outHour.":".$outMinute.":00";
		}		
	}
	else {	
		if ($outHour == 12)	{
			$out = $outYear."-".$outMonth."-".$outDay." ".$outHour.":".$outMinute.":00";
		}
		else {
			$out = $outYear."-".$outMonth."-".$outDay." ".($outHour+12).":".$outMinute.":00";	
		}
	}

	//Input the FROM time to the SQL database

	//Prepare the SQL commands
	$user = $_SESSION['username'];
	$writeTime = $databaseConnection->prepare("UPDATE accounts SET Reservation = :fromTime WHERE Username = :username");
	$writeTime->bindParam(':fromTime', $in);
	$writeTime->bindParam(':username', $user);
	$writeTime->execute();

	header("Location: account.php");
	}
?>