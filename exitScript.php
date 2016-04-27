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
		$plate = trim($_POST['plate']);//-----------------edited
		$spot = trim($_POST['spot']);//--------------edited

		if($plate == '')
			$errMsg .= 'No plate number!<br>';

		if($spot == '')
			$errMsg .= 'No spot number!<br>';


		//WILL NEED TO CHANGE DATABASE CONNECTION

		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT username,password FROM  accounts WHERE username = :username AND password = :password');
			$records->bindParam(':plate', $plate);//--------------edited
			$records->bindParam(':spot', $spot);//--------------edited
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);
			echo count($results);
			if(count($results) == 1){

				header("Location: loginError.php");
				exit;
			}
			else{
				$_SESSION['username'] = $results['username'];
				header("Location: account.php");
				exit;
			}
		}

	}
	//header("Location: register.php");
?>
