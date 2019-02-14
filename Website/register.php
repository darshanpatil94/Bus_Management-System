<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: /public_html/bb/index.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));

	if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
	{
		?>
        <script>alert('successfully registered ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
?>

<html>
	<head>
		<title>User Centric Bus Management</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
	<div id="conteneur">
		  <div id="header">User Centric bus management</div>

		  <div id="haut">
			<ul class="menuhaut">
				<li class="current"><a href="/public_html/">Login</a></li>
				<li><a href="/public_html/about.php">About</a></li>
			</ul>
		  </div>

		  <div id="centre">
			<h3>Register</h3>
			<br>
                     <form method="post">
                     &nbsp;&nbsp;
                     <input type="text" name="uname" size="35" placeholder="User Name" required />
                              <br><br>
		&nbsp;&nbsp;
                <input type="email" name="email" size="35" placeholder="Your Email" required />
				<br><br>
		 &nbsp;&nbsp;
			<input type="password" name="pass" size="35" placeholder="Your Password" required />
                                 <br><br>
				&nbsp;&nbsp;
				<button type="submit" name="btn-signup">Register</button>
                                <br><br>
				&nbsp;&nbsp;&nbsp;
                                <a href="index.php">Sign In Here</a>
                                    <br><br>
                          </form>

			<br><br><br><br>
			</div>
<!--		<div id="pied">Design by <a href="http://nicolas.freezee.org">Nicolas Fafchamps</a></div>       -->
	</div>
	</body>
</html>