
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
//  $endTime = trim($_POST['endTime']);
  $spotNum = trim($_POST['spotNum']);

  // update corresponding account's startTime
  $records = $databaseConnection->prepare('UPDATE accounts SET startTime=:startTime WHERE LicensePlate = :plateNum');
  $records->bindParam('plateNum', $plateNum);
  $records->bindParam('startTime', $startTime);
  $records->execute();

  //need code here to update username colmun in parkinggarage table
  $relate = $databaseConnection->prepare('SELECT username FROM accounts WHERE LicensePlate = :plateNum');
  $relate->bindParam(':plateNum',$plateNum);
  $relate->execute();
  $username = $relate->fetch(PDO::FETCH_ASSOC);
  $username = $username['username'];
  print_r($username);

  $relate = $databaseConnection->prepare('UPDATE parkingspaces SET Username= :username,  StartTime=:startTime, Status=2, LicensePlate = :plateNum WHERE SpotNumber= :spotNum');
  $relate->bindParam('username',$username);
  $relate->bindParam('spotNum',$spotNum);
  $relate->bindParam('startTime', $startTime);
  $relate->bindParam('plateNum', $plateNum);
  $relate->execute();

}


//submit 2 is the checkout form
if(isset($_POST["submit2"])){
  //username and password sent from Form1
  $endTime = trim($_POST['endTime']);
  $spotNum = trim($_POST['spotNum']);

  // update corresponding account's startTime
//  $records = $databaseConnection->prepare('SELECT ')

  $records = $databaseConnection->prepare('SELECT LicensePlate FROM parkingspaces WHERE SpotNumber = :spotNum');
  $records->bindParam(':spotNum', $spotNum);
  $records->execute();
  $plateNumArray = $records->fetch(PDO::FETCH_ASSOC);
  $plateNum = $plateNumArray['LicensePlate'];

  $records = $databaseConnection->prepare('UPDATE accounts SET endTime= :endTime WHERE LicensePlate = :plateNum');
  $records->bindParam(':plateNum', $plateNum);
  $records->bindParam(':endTime', $endTime);
  $records->execute();

  // set corresponding parking space in parkingspaces to occupied
  $records = $databaseConnection->prepare('UPDATE parkingspaces SET startTime = NULL, LicensePlate = NULL, Status=1, username = NULL WHERE SpotNumber = :spotNum');
  $records->bindParam('spotNum', $spotNum);
  $records->execute();
}
header("Location: index.php");
?>
