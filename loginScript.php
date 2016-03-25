<?php
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
		echo 'ERROR: ' . $e->getMessage();
	}
	
	echo var_dump(isset($_POST["submit"]));
	if(isset($_POST["submit"])){
		$errMsg = '';
		//username and password sent from Form
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		if($username == '')
			$errMsg .= 'You must enter your Username<br>';
		
		if($password == '')
			$errMsg .= 'You must enter your Password<br>';
		
		
		if($errMsg == ''){
			$records = $databaseConnection->prepare('SELECT id,username,password FROM  accounts WHERE username = :username AND password = :password');
			$records->bindParam(':username', $username);
			$records->execute();
			$results = $records->setFetchMode(PDO::FETCH_ASSOC);
			if(count($results) == 1){
				$_SESSION['username'] = $results['username'];
				header("Location: account.html");
				exit;			
			}else{
				$errMsg .= 'Username and Password are not found<br>';
				header("Location: index.php");
			}
		}

	}
	//header("Location: register.php");
?>