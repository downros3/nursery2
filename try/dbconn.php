<?php

function Connect()
{
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "test"; /* database name in xampp */

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

return $conn;
}

function CloseCon($conn)
{
	$conn -> close();
}
?>