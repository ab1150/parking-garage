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

if(isset($_POST["submit"])){
  $errMsg = '';
  //username and password sent from Form1
  $plateNum = trim($_POST['plateNum']);
  $startTime = trim($_POST['startTime']);
  $endTime = trim($_POST['endTime']);
  $spotNum = trim($_POST['spotNum']);

  // update corresponding account's startTime
  $records = $databaseConnection->prepare('UPDATE accounts SET startTime=:startTime WHERE LicensePlate = :plateNum');
  $records->bindParam('plateNum', $plateNum);
  $records->bindParam('startTime', $startTime);
  $records->execute();

  // set corresponding parking space in parkingspaces to occupied
  $records = $databaseConnection->prepare('UPDATE parkingspaces SET StartTime=:startTime, Status=2 WHERE SpotNumber = :spotNum');
  $records->bindParam('spotNum', $spotNum);
  $records->bindParam('startTime', $startTime);
  $records->execute();
}
//submit 2 is the checkout form
if(isset($_POST["submit2"])){
  $errMsg = '';
  //username and password sent from Form1
  $endTime = trim($_POST['endTime']);
  $spotNum = trim($_POST['spotNum']);

  // update corresponding account's startTime
  $records = $databaseConnection->prepare('UPDATE accounts SET startTime=:startTime WHERE LicensePlate = :plateNum');
  $records->bindParam('plateNum', $plateNum);
  $records->bindParam('startTime', $startTime);
  $records->execute();

  //need code here to update username colmun in parkinggarage table

  // set corresponding parking space in parkingspaces to occupied
  $records = $databaseConnection->prepare('UPDATE parkingspaces SET StartTime=:startTime, Status=2, username= WHERE SpotNumber = :spotNum');
  $records->bindParam('spotNum', $spotNum);
  $records->bindParam('startTime', $startTime);
  $records->execute();
}
header("Location: index.php");
?>
