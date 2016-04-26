<?php
	include("reservationScript.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Parking Reservation</title>
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<style>
	.ey
	 {
	  display:inline-block;
	 }
	form{
	    display:inline-block;
	}
</style>
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
				<h2>Make A Reservation</h2>
				<form action="reservationScript.php" method="POST">
				From:<br>
				Date (MM/DD/YYYY):
                <input type="number" name="inMonth" min="1" max="12" step="1" required="required">
                /
                <input type="number" name="inDay" min="1" max="31" step="1" required="required">
                /
                <input type="number" name="inYear" min="2016" max="2017" step="1" required="required">
                Time:
                <input type="number" name="inHour" min="1" max="12" step="1" required="required">
                :
                <input type="number" name="inMinute" min="0" max="59" step="1" required="required">
                <select name="inDaytime" >
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>
				<br>
				To:<br>
				Date (MM/DD/YYYY):
                <input type="number" name="outMonth" min="1" max="12" step="1" required="required">
                /
                <input type="number" name="outDay" min="1" max="31" step="1" required="required">
                /
                <input type="number" name="outYear" min="2016" max="2017" step="1" required="required">
                Time:
                <input type="number" name="outHour" min="1" max="12" step="1" required="required">
                :
                <input type="number" name="outMinute" min="0" max="59" step="1" required="required">
                <select name="outDaytime">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
				</select>
				<br>
				<input type = "submit" name = "submit" value = "Submit">
			</form>
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
