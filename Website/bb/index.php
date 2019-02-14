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

<html>
	<head>
		<title>User Centric Bus Management</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
		<link rel="stylesheet" href="bbstyle.css" />

    </div>
	</head>
	<body>
	<div id="conteneur">
		  <div id="header">User Centric Bus Management</div>
                   <div id="signout">
        	   hi' <?php echo $userRow['username']; ?>&nbsp;<a href="/public_html/logout.php?logout">Sign Out</a>
                   </div>
		  <div id="haut">
			<ul class="menuhaut">
				<li class="current"><a href="/public_html/bb/">Description</a></li>
				<li><a href="/public_html/bb/distancefinder/">Distance finder</a></li>
				<li><a href="/public_html/bb/gpstracker/">GPS Tracker</a></li>
		<!--		<li><a href=""></a></li>
				<li><a href=""></a></li>  -->
				<li><a href="/public_html/bb/about.php">About</a></li>
			</ul>
		  </div>

		  <div id="centre">
			<h2>Abstract</h2>
			<p align="justify">The primary challenge for an urban bus system is to maintain constant headways between successive buses.
                        Most bus systems try to achieve this by adherence to a schedule; but this is undermined by the tendency of headways
                         to collapse, so that buses travel in bunches. Making use of the GPS, the unit which are freshly incorporated in the bus
                          transport system, we can send the real time position of the bus. By making use of simple timer system (basically a micro-controller)
                           which is loaded with time interval (pre-calculated for various traffic conditions) for traveling from one stop to adjacent.
                           This time interval is displayed to the driver using display board which suggests him, about timing he has to maintain so that
                            he efficiently maintains regularity and bus bunching problem is solved. Using Internet of things(IOT) the transportation system
                             can be made more effective and reliable.</p>
			<br>
  	                <h2>Objective</h2>
 			<p align="justify">The objective of the project is to send the real time location of buses and taking the distance
                          between the buses as constant parameter, we are calculating the timings which are to be maintained in order to avoid
                          bunching of buses. These timings will be displayed on to the driver so as to notify him and this timing is calculated
                           based on other bus locations and traffic conditions.</p>
                         <br><br>
                       <p>Bus bunching Model Click here--> <a href="http://setosa.io/bus/">Bus Bunching Model</a></p>


                       <!--  <h2>Next Header</h2>
			<p>Enter Para3 </p>

                          <h2>Some lists</h2>
			        	<h3>An ul list</h3>
					<ul>
							<li>First element</li>
							<li>Second element</li>
					</ul>
					<h3>An ol list</h3>
					<ol>
							<li>First element</li>
							<li>Second element</li>
					</ol>
			-->
			<br><br><br><br><br> <br><br><br><br><br><br><br><br><br>
			</div>
<!--		<div id="pied">Design by <a href="http://nicolas.freezee.org">Nicolas Fafchamps</a></div>       -->
	</div>
	</body>
</html>
