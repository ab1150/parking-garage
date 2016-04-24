<!DOCTYPE html>
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
				$output = "<table style='border: solid 1px black;'>";

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "parkingGarage";

				$cols = 10;
				$cnt = 0;
				$status = 'Status';
				try
				{		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				    $stmt = $conn->prepare("SELECT SpotNumber FROM parkingspaces WHERE Status ='VACANT'");
						$stmt->execute();

						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
					        $output .= "<td height='40px'><span style='color:green'>{$row['SpotNumber']}</span></td>";
					        $cnt++;
					        if($cnt % $cols == 0)
					         { $output .= "</tr><tr>"; }
					  }
				  }
				catch(PDOException $e) {
				    echo "Error: " . $e->getMessage();
				}
				$conn = null;
				$output .= "</tr></table>";
  			echo $output;

			//	$cols = 10;
			//	$cnt = 0;
			//	$status = 'Status';
				try
				{
						$output = "<table style='border: solid 1px black;'>";
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT SpotNumber FROM parkingspaces");
						$stmt->execute();

						while($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
									$output .= "<td height='40px'><span style='color:red'>{$row['SpotNumber']}</span></td>";
									$cnt++;
									if($cnt % $cols == 0)
									 { $output .= "</tr><tr>"; }
						}
					}
				catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
				}
				$conn = null;
				$output .= "</tr></table>";
				echo $output;

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
