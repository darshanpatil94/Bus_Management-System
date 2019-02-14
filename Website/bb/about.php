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
		<title>Bus Management System</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15" />
		<link rel="stylesheet" href="bbstyle.css" />
	</head>

        <body>
	<div id="conteneur">
		  <div id="header">User Centric Bus Management</div>
                  <div id="signout">
        	   hi' <?php echo $userRow['username']; ?>&nbsp;<a href="/public_html/logout.php?logout">Sign Out</a>
                   </div>
		  <div id="haut">
			<ul class="menuhaut">
				<li ><a href="/public_html/bb/index.php">Description</a></li>
				<li><a href="/public_html/bb/distancefinder/">Distance finder</a></li>
				<li><a href="/public_html/bb/gpstracker/">GPS Tracker</a></li>
		<!--		<li><a href=""></a></li>
				<li><a href=""></a></li>  -->
				<li class="current"><a href="/public_html/bb/about.php">About</a></li>
			</ul>
		  </div>

		  <div id="centre">
			<h1>About</h1>
			<h2>User Centric Bus Management</h2>
		<!--	<p>Enter para here </p>
                    -->

					<h2>A Major Project by</h2>
					<ul>
							<li>Akhil Naik</li>
							<li>Darshan S. Patil</li>
							<li>Kamran Ahmed Badebade</li>
							<li>Karthik Prabhu</li>
							<li>Vivekanda Kulkarni</li>
					</ul>
					<h2>Guide: Prof. Kiran M R</h2>
					<br>
					<br>
					<h2>Contact Information</h2>

						<h2>	Darshan S. Patil <br>
                                                        Email ID: darshan.patil94@gmail.com
                                                   <br> Mobile number: +91 9686871684  </h2>


			</div>
<!--		<div id="pied">Design by <a href="http://nicolas.freezee.org">Nicolas Fafchamps</a></div>       -->
	</div>
	</body>
</html>
