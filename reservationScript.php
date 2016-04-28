<?php
//This is the handler script for creating reservations

/* Reservation class holds the reservation time, functions for finding a reservation, and the reserved parking
   space, if one is successfully reserved. */
class Reservation
{
    //Reservation start time
    $in = NULL;
    //Reservation end time

    /* reserveSpace checks for parking spaces that are available for the requested time period
       and reserves them. Returns an error number if there are no available spots. */
    function reserveSpace(
    $in, $out)
    {
        //Find spots with the requested time slot available
        $findSlot = $databaseConnection->prepare('INSERT INTO unavTab SELECT SpotNumber FROM reservations WHERE (startTime BETWEEN :in AND :out) OR (endTime between :in AND :out) OR ((startTime < :in) AND (endTime > :in))');
        $findSlot->bindParam(':in', $in);
        $findSlot->bindParam(':out', $out);
        $findSlot->execute();
        $avTab = $databaseConnection->prepare('SELECT parkingspaces.SpotNumber FROM (unavTab LEFT JOIN parkingspaces ON unavTab.SpotNumber=parkingspaces.SpotNumber) WHERE parkingspaces.SpotNumber IS NULL');
        $avTab->execute();
        $output = $avTab->setFetchMode(PDO::FETCH_NUM);
        $space = $avTab->fetch())[0];
        //If there is an available spot, reserve it
        if ($space != NULL)
        {
            //Prepare the SQL commands
            $user = $_SESSION['username'];
            $writeTime = $databaseConnection->prepare("UPDATE accounts SET Reservation = :fromTime, ReservedSpot = :parkingSpace WHERE Username = :username");
            $writeTime->bindParam(':fromTime', $_POST["startTime"]);
            $writeTime->bindParam(':parkingSpace', $space);
            $writeTime->bindParam(':username', $user);
            $writeTime->execute();
            //Return "true" indicating success
            return true;
        }
        //If there are no available spots, return "false"
        else
        {
            return false;
        }
    }

    /* alterTime changes the original reservation time in the event that there are no available spots. It first
       shifts the reservation time either earlier or later without changing its length, and attempts to make a reservation. If shifting the reservation time does not work, alterTime will then reduce the length of the reservation by 15 minutes increments, reducing up to a maximum of 1 hour, and attempts to make a reservationa again. If even that fails, return an error. */
    function alterTime()
    {

    }

}
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
		/*Find available reservation spot and create if available, return error if unavailable.
		  We want all reservations where startime is between $in and $out AND/OR endtime is between $in and $out */
        $in = $_POST['startTime'];
        $out = $_POST['endTime'];
        //If reservation was a sucess, return to account page
        if (reserveSpace($in, $out))
        {
            header("Location: account.php");
        }
        //If reservation failed, alter the reservation time and try again
        else
        {

        }

            /* If there are no available parking spaces, shift the original reservation time slot earlier or later
            and try to find a fit. If a spot still cannot be found, start shortening the time of the reservation by 15 minute increments and attempt to find a spot again. If there is still no spot available, return an error. */

	}
?>
