<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: /public_html/index.php");
}
else if(isset($_SESSION['user'])!="")
{
	header("Location: /public_html/bb/index.php");
}

if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	header("Location: /public_html/index.php");
}
?>