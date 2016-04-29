<?php
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
                    		echo 'ERROR: ' . $e->getMessage();
                    	}

                        //connect to SQL host
                        try {
                            $connection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
                            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        }
                        catch (PDOException $err)
                        {
                            echo $err->getMessage();
                        }

                        function getSingleValue($tableName, $prop, $value, $columnName, $connection)
							{
							  $q = $connection->query("SELECT `$columnName` FROM `$tableName` WHERE $prop='".$value."'");
							  $f = $q->fetch();
							  $result = $f[$columnName];
							  return $result;
							}

?>
<!DOCTYPE html>
<html>
<head>
<title>Order Summary</title>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<h1><a href="index.php">Automated Garage</a></h1>
				<nav class="links">
					<ul>
						<li><p>Welcome! </p></li>
						<li><a href="reservation.php">Make a reservation</a></li>
						<li><a href="index.php">Log out</a></li>
					</ul>
				</nav>
				<nav class="main">
					<ul>
						<li class="search">
								<a class="fa-search" href="#search">Search</a>
								<form id="search" method="get" action="#">
								<input type="text" name="query" placeholder="Search" />
							</form>
						</li>
						<li class="menu">
							<a class="fa-bars" href="#menu">Menu</a>
						</li>
					</ul>
				</nav>
		</header>

		<!-- Menu -->
		<section id="menu">
			<section>
				<ul class="links">
					<li>
						<a href="reservation.php"><h3>Make a reservation</h3></a>
						<a href="index.php"><h3>Log out</h3></a>
					</li>
			</section>
		</section>

		<!-- Main -->
		<div id="main">
			<article class="post">
				<p>
					<h2>Transaction Summary</h2>
					<form action="action_page.php" method="post" accept-charset="UTF-8">



							<?php
  							$user = htmlspecialchars($_SESSION['username']);
  							$result = getSingleValue('accounts','username',$user,'paymentneeded',$connection);
  	            echo "Payment tendered: $result<br><br>";
	            ?>

	            <!--<?php
	            $records = $databaseConnection->prepare('SELECT paymentneeded FROM  accounts WHERE LicensePlate = :plate');

	            ?>-->



	            <?php
	            	$user = htmlspecialchars($_SESSION['username']);
  							$result = getSingleValue('accounts','username',$user,'Balance',$connection);
  	            echo "Remaining Balance: $result<br><br>";


	            ?>



				
					<a href="reservation.php">Make another reservation</a><p>
					</form>
				</p>
			</article>
		</div>


<!--standard-->
		<section id="sidebar">
			<section id="intro">
				<header>
					<a href="account.php" class="image"><img src="images/0104.jpg"></a>
					<h2>George Street Garage</h2>
                </header>
			</section>
			
		</section>
	</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
</body>
</html>
