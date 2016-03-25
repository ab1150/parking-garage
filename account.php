<!DOCTYPE html>
<html>
<head>
<title>Account</title>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<h1><a href="index.html">Automated Garage</a></h1>
				<nav class="links">
					<ul>
						<li><p>Welcome! </p></li>
						<li><a href="reservation.html">Make a reservation</a></li>
						<li><a href="index.html">Log out</a></li>
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
						<a href="reservation.html"><h3>Make a reservation</h3></a>
						<a href="index.html"><h3>Log out</h3></a>
					</li>
			</section>
		</section>

		<!-- Main -->
		<div id="main">
			<article class="post">
				<p>
					<h2>My Reservations</h2>
					<form action="action_page.php" method="post" accept-charset="UTF-8">
						<a>Current occupancies</a><br><br>
						<a>My Reservations</a><br><br>
						<p>Time Remaining</p><br>
						<!-- clock -->
						<script>
						function startTime() {
						    var today = new Date();
						    var h = today.getHours();
						    var m = today.getMinutes();
						    var s = today.getSeconds();
						    m = checkTime(m);
						    s = checkTime(s);
						    document.getElementById('time').innerHTML =h + ":" + m + ":" + s;
						    var t = setTimeout(startTime, 500);
						}
						function checkTime(i) {
						    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
						    return i;
						}
						</script>
						<body onload="startTime()"> </body>
						Current time:
						<div id="time"></div>
                        <br>
					<a href="reservation.html">Make a reservation</a><p>
					</form>
				</p>
			</article>
		</div>

		<section id="sidebar">
			<section id="intro">
				<header>
					<a href="account.html" class="image"><img src="images/0104.jpg"></a>
					<h2>My Account</h2>
                </header>
			</section>
			<div>
				<p>
					<h2>My Info</h2>
                        <?php
                        //start session
                        session_start();

                        //connect to SQL host
						define('_HOST_NAME_', 'localhost');
						define('_USER_NAME_', 'root');
						define('_DB_PASSWORD', '');
						define('_DATABASE_NAME_', 'parkinggarage');
                        try {
                            $connection = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
                            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        }
                        catch (PDOException $err)
                        {
                            echo $err->getMessage();
                        }
                        //store the username in a variable for use in SQL commands
                        $user = htmlspecialchars($_SESSION['username']);
                        //print username and password
                        echo "Username: $user <br>";
                        echo "Password: ****** <br>";
                        //send SQL queries to the database and print the result
                        //print the balance
                        $balanceSQL = $connection->prepare("SELECT Balance FROM accounts WHERE username = :user");
                        $balanceSQL->bindParam(':user',$user);
                        $balanceSQL->execute();
                        $balance = $balanceSQL->setFetchMode(PDO::FETCH_ASSOC);
                        echo "Balance: $balance <br>"; 
                        //print any reservations
                        $reservationSQL = $connection->prepare("SELECT Reservation FROM accounts WHERE username = :user");
                        $reservationSQL->bindParam(':user',$user);
                        $reservationSQL->execute();
                        $reservation = $reservationSQL->setFetchMode(PDO::FETCH_ASSOC);
                        echo "Reservations: $reservation<br>"; 
                        //print license plate of car
                        $licenseSQL = $connection->prepare("SELECT LicensePlate FROM accounts WHERE username = :user");
                        $licenseSQL->bindParam(':user',$user);
                        $licenseSQL->execute();
                        $license = $licenseSQL->setFetchMode(PDO::FETCH_ASSOC);
                        echo "License Plate: $license<br>"; 
                        //close connection
                        $connection->close();
                    ?>
                    <br>
					<a href="editinfo.html">Edit Info</a><p>
					</form>
				</p>
			</div>
		</section>
	</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
</body>
</html>