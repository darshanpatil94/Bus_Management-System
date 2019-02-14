public_html<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: /public_html/bb/index.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE email='$email'");
	$row=mysql_fetch_array($res);

	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: /public_html/bb/index.php");
	}
	else
	{
		?>
        <script>alert('wrong details');</script>
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
			<h3>Login</h3>
			<br>
                     <form method="post">
                     &nbsp;&nbsp;
                     <input type="text" name="email" size="40" placeholder="Your Email" required />
                              <br><br>
		&nbsp;&nbsp;
                <input type="password" name="pass" size="40" placeholder="Your Password" required />
				<br><br>
				&nbsp;&nbsp;
				<button type="submit" name="btn-login">Sign In</button>
                                  <br><br>
				&nbsp;&nbsp;&nbsp;
                                <a href="register.php">Sign Up Here</a>
                                    <br><br>
                          </form>

			<br><br><br><br><br> <br><br><br><br><br><br><br><br><br><br>
			</div>
<!--		<div id="pied">Design by <a href="http://nicolas.freezee.org">Nicolas Fafchamps</a></div>       -->
	</div>
	</body>
</html>