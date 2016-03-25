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
			<h1><a href="index.html">Automated Garage</a></h1>
				<nav class="links">
					<ul>
						<li><a href="register.html">Register</a></li>
						<li><a href="login.html">Log in</a></li>
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
						<a href="register.html"><h3>Register</h3></a>
						<a href="login.html"><h3>Log in</h3></a>
						<a href="reservation.html"><h3>Make a reservation</h3></a>
					</li>
			</section>
		</section>

		<!-- Main -->
		<div id="main">
			<article class="post">
				<h2>Make Reservation</h2>
				From:<br>
                <input type="range" name="month" min="1" max="12" step="1">
                <input type="range" name="day" min="1" max="31" step="1">
                <input type="range" name="year" min="2016" max="2017" step="1">
                <input type="range" name="hour" min="1" max="12" step="1">
                <input type="range" name="minute" min="0" max="59" step="1">
                <select name="daytime">
					<option value="1">AM</option>
					<option value="2">PM</option>
				</select>
				To:<br>
                <input type="range" name="month" min="1" max="12" step="1">
                <input type="range" name="day" min="1" max="31" step="1">
                <input type="range" name="year" min="2016" max="2017" step="1">
                <input type="range" name="hour" min="1" max="12" step="1">
                <input type="range" name="minute" min="0" max="59" step="1">
                <select name="daytime">
					<option value="1">AM</option>
					<option value="2">PM</option>
				</select>
				<input type = "submit" value = "Check Available Spots">
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
