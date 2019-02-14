<?php
if(!mysql_connect("mysql12.000webhost.com","a1642543_bb","darshan94"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("a1642543_bb"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>