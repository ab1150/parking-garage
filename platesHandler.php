<?php
/* This is a script that catches and parses the input received from the aplr daemon and writes the license plate
   into plate.txt and the SQL database*/

//Catch input from the daemon and parse the license plate out of it
$results = fopen("plate.txt","w");
$input = file_get_contents("php://input");
fwrite($results,"$input");
fclose($results);
$results = fopen("plate.txt","r");
$parsedInput = json_decode(fread($results,filesize("plate.txt")), true);
$plate = $parsedInput['results'][0]['plate'];
fclose($results);

//Write the license plate into plate.txt
$results = fopen("plate.txt","w");
fwrite($results, "$plate");
fclose($results);

//Write the license plate into the SQL database

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

$writePlate = $databaseConnection->prepare("INSERT INTO");

?>
