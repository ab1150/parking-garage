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
				$entry = $entry['startTime'];
				echo $entry;
				echo  "<br>";



				$records = $databaseConnection->prepare('DELETE FROM accounts WHERE username = "" AND LicensePlate = :plate AND paymentneeded = 0');
				$records->bindParam('plate', $plate);
				$records->execute();

				$records = $databaseConnection->prepare('SELECT * FROM accounts WHERE LicensePlate = :plateNum');
				$records->bindParam(':plateNum', $plate);
				$records->execute();
				$Array = $records->fetch(PDO::FETCH_ASSOC);
				$balance = $Array['Balance'];
				$start = new DateTime($Array['startTime']);
				$end = new DateTime($Array['endTime']);

				$interval = $end->diff($start);
				$paymentneeded = (24*$interval->d + $interval->h)*5;

				$records = $databaseConnection->prepare('UPDATE accounts SET paymentneeded = :paymentneeded, balance = :balance - :paymentneeded WHERE LicensePlate = :plateNum');
				$records->bindParam(':paymentneeded', $paymentneeded);
				$records->bindParam(':balance', $balance);
				$records->bindParam(':plateNum', $_POST['Plate']);
				$records->execute();
				header("Location: index.php");
				exit;
			}
			else{
				header("Location: exitError.php");
				exit;
			}
		}
	}
	//header("Location: register.php");
?>
