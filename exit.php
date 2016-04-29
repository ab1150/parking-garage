<?php
	include('exitScript.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Exit Camera</title>
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
				<p>
					<h2>Exit Camera</h2>
					<form action="exitScript.php" method="post" accept-charset="UTF-8">
						License Plate:<br>
						<input type ="text" name="Plate"/><br>
						<!--Parking Spot Number:<br>
						<input type ="text" name="Spot"/><br>-->
						<input type="submit" value="submit" name="submit"/><br>
					</form>
				</p>
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
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>


	</body>
</html>
