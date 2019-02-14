<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: /public_html/index.php");
}

$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php

	if (!empty($_GET['latitude']) && !empty($_GET['longitude']))
        // && !empty($_GET['time']) && !empty($_GET['satellites']) &&
	//     !empty($_GET['speedOTG']) && !empty($_GET['course']))
           {
		function getParameter($par, $default = null)
                {
		if (isset($_GET[$par]) && strlen($_GET[$par])) return $_GET[$par]; elseif (isset($_POST[$par]) && strlen($_POST[$par]))
				return $_POST[$par];
			else return $default;
		}

		$file = 'gps.txt';
		$lat = getParameter("latitude");
		$lon = getParameter("longitude");
	//	$time = getParameter("time");
	//	$sat = getParameter("satellites");
	//	$speed = getParameter("speedOTG");
	//	$course = getParameter("course");
		$person = $lat.",".$lon."\n";
        //      ".$time.",".$sat.",".$speed.",".$course."\n";

		echo "	DATA:\n Latitude: ".$lat."\n Longitude: ".$lon."\n ";
	//		Time: ".$time."\nSatellites: ".$sat."\n	Speed OTG: ".$speed."\n	Course: ".$course;

		if (!file_put_contents($file, $person, FILE_APPEND | LOCK_EX))
			echo "\n\t Error saving Data\n";
		else echo "\n\t Data Save\n";
	}
	else {  }
?>


<html>
	<head>
		<title>User Centric Bus Management</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
		<link rel="stylesheet" href="trackerstyle.css" />
		<script language="JavaScript" type="text/javascript" src="jquery-1.10.1.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDpeOM-L1dYy6aCVfm2Fo7U7vrcIr2PVds&sensor=false"></script>
                <script type="text/javascript" src="gpsscript.js"></script>

	</head>
	<body>
	<div id="conteneur">
		  <div id="header">User Centric Bus Management</div>
                   <div id="signout">
        	   hi' <?php echo $userRow['username']; ?>&nbsp;<a href="/public_html/logout.php?logout">Sign Out</a>
                   </div>
		  <div id="haut">
			<ul class="menuhaut">
				<li><a href="/public_html/bb/index.php">Description</a></li>
				<li><a href="/public_html/bb/distancefinder/">Distance finder</a></li>
				<li class="current"><a href="/public_html/bb/gpstracker/">GPS Tracker</a></li>
		<!--		<li><a href=""></a></li>
				<li><a href=""></a></li>  -->
				<li><a href="/public_html/bb/about.php">About</a></li>
			</ul>
		  </div>

		  <div id="centre">
			<br>
			<?php
		          echo '

		<!-- Draw information table and Google Maps div -->

		<div>
			<center><br />
				<h2> GPS POSITION TRACKER </h2><br>
				<div id="superior">
					<table style="width:100%">
						<tr>
							<td>Time</td>
							<td>Satellites</td>
							<td>Speed OTG</td>
							<td>Course</td>
						</tr>
						<tr>
							<td id="time">'. date("Y M d - H:m") .'</td>
							<td id="sat"></td>
							<td id="speed"></td>
							<td id="course"></td>
						</tr>
				</table>
				</div>
				<br /><br />
				<div id="gpstrackermap"></div>
				<br>
			</center>
		</div>';
	?>


                   </div>
<!--		<div id="pied">Design by Darshan Patil</a></div>       -->
	</div>
	</body>
</html>