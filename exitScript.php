<?php
	session_start();


	//WILL NEED TO CHANGE CONFIG CONSTRAINTS I THINK

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
		echo 'ERROR: ' . $e->getMessage();
	}

	if(isset($_POST["submit"])){
		$errMsg = '';
		//username and password sent from Form1
		$plate = trim($_POST['Plate']);//-----------------edited

		if($plate == '')
			$errMsg .= 'No plate number!<br>';


		//WILL NEED TO CHANGE DATABASE CONNECTION

		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT LicensePlate FROM  accounts WHERE LicensePlate = :plate');
			$records->bindParam(':plate', $plate);//--------------edited
			$records->execute();
			$results = $records->fetch();
			//echo count($results[0]);

			// if account doesn't have a username (i.e. is temporary), purge from accounts list after payment
			if(count($results[0]) == 1){
				$start = $databaseConnection->prepare('SELECT startTime FROM accounts WHERE LicensePlate = :plate');
				$start->bindParam('plate', $plate);
				$start->execute();
				$entry = $start->fetch();
				echo $entry->format('Y-m-d H:i:sP') . "\n";
				$date = new DateTime();
				$interval = $date->diff($start);
				//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 


				$records = $databaseConnection->prepare('DELETE FROM accounts WHERE username = "" AND LicensePlate = :plate AND paymentneeded = 0');
				$records->bindParam('plate', $plate);
				$records->execute();
				//header("Location: index.php");
				exit;
				/*				//------------- should change field of account balance if my syntax is correct
				$_SESSION['username'] = $results['username'];
				$records = $databaseConnection->prepare('UPDATE accounts SET AccountBalance = (AccountBalance - paymentneeded), paymentneeded = 0 WHERE LicensePlate == :plate');
				$records->bindParam(':plate', $plate);
				$records->execute();
				//------------- should make a PAYMENT RECEIVED page*/
			}
			else{
				header("Location: exitError.php");
				exit;
			}
		}
	}
	//header("Location: register.php");
?>
