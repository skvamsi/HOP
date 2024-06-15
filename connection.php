<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="seekers_db";
	$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$con)
	{
		die("falied to connect!");
	}
?>