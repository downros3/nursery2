<?php

function Connect()
{
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "nursery2"; /* database name in xampp */

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

return $conn;
}

function CloseCon($conn)
{
	$conn -> close();
}
?>