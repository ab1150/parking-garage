<!DOCTYPE html>
<!-- //written by: Calvin Li and Sean Wu  and Anushiya Balakrishnan
//tested by: Anantha Mahavrathayajula
//debugged by: Sam Yang and Justen Yeung -->


<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
	<div id="wrapper">
		<header id="header">
			<h1><a href="index.php">Automated Garage</a></h1>
				<nav class="links">
					<ul>
						<li><a href="register.php">Register</a></li>
						<li><a href="login.php">Log in</a></li>
						<li><a href="reservation.php">Reservations</a></li>
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
						<a href="register.php"><h3>Register</h3></a>
						<a href="login.php"><h3>Log in</h3></a>
						<a href="reservation.php"><h3>Make a reservation</h3></a>
					</li>
			</section>
		</section>

		<!-- Main -->
		<div id="main">
			<article class="post">
				<header>
					<div class="title">
						<h2>About us</h2>
						<p>Group 6: Anushiya Balakrishnan, Calvin Li, Anantha Mahavrathayajula, Sean Wu, Sam Yang, Justen Yeung <p>
					</div>
				</header>
				<?php
				echo "<table style='border: solid 1px black;'>";
				echo "<tr><th>Spot Number</th><th>Status</th><th>Username</th><th>Start Time</th><th>Price</th></tr>";

				class TableRows extends RecursiveIteratorIterator { 
				    function __construct($it) { 
				        parent::__construct($it, self::LEAVES_ONLY); 
				    }

				    function current() {
				        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
				    }

				    function beginChildren() { 
				        echo "<tr>"; 
				    } 

				    function endChildren() { 
				        echo "</tr>" . "\n";
				    } 
				} 

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "parkingGarage";

				try {
				    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    $stmt = $conn->prepare("SELECT SpotNumber, Status, Username, StartTime, Price FROM parkingSpaces"); 
				    $stmt->execute();

				    // set the resulting array to associative
				    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
				        echo $v;
				    }
				}
				catch(PDOException $e) {
				    echo "Error: " . $e->getMessage();
				}
				$conn = null;
				echo "</table>";
				?>
			</article>
		</div>

		<section id="sidebar">
			<section id="intro">
				<header>
					<a href="#" class="image"><img src="images/0104.jpg"></a>
					<h2>George Street Garage</h2>
			</section>
		</section>
	</div>


		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

</body>
</html>
