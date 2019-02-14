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
	         <link rel="stylesheet" href="distancefinderstyle.css" />
		 <script type="text/javascript"  src="http://maps.google.com/maps/api/js?sensor=false"></script>
                 <script type="text/javascript" src="myscript.js"></script>
	</head>

<body>
              <div id="conteneur">
		  <div id="header">User Centric Bus Management</div>
                  <div id="signout">
        	   hi' <?php echo $userRow['username']; ?>&nbsp;<a href="/public_html/logout.php?logout">Sign Out</a>
                   </div>
		  <div id="haut">
			<ul class="menuhaut">
				<li><a href="/public_html/bb/">Description</a></li>
				<li class="current"><a href="/public_html/bb/distancefinder/">Distance finder</a></li>
				<li><a href="/public_html/bb/gpstracker/">GPS Tracker</a></li>
		<!--		<li><a href=""></a></li>
				<li><a href=""></a></li>  -->
				<li><a href="/public_html/bb/about.php">About</a></li>
			</ul>
		  </div>

                <div id="form">

                            <br>
                         <h2>Find the distance between two locations</h2>
                           <br>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     Source address:

                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <input type="text" name="address1" id="address1" size="50"/>
                              <br><br>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     Destination address:

		&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="address2" id="address2" size="50"/>
				<br><br>

		&nbsp;&nbsp;&nbsp;&nbsp;
                Bus Stop_1 address:

                 &nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="address3" id="address3" size="50"/>
                         <br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;
                Bus Stop_2 address:

                 &nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="text" name="address4" id="address4" size="50"/>
                 <br><br>
                 &nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="button" value="Show" onclick="initialize();"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="button" value="Bus Stops" onclick="checkpoint();"/>

	</div>
	<br><br>

	<div id="map_canvas"></div>
	<br><div id="distance_direct"></div>
	<br><br><br><div id="distance_road"></div>
	<br><br><div id="distance_road2"></div>
	<br><br><div id="distance_road3"></div>
	<br><br><div id="distance_road4"></div>


                 <br><br> <br><br><br><br>
          </div>
	</body>
</html>
