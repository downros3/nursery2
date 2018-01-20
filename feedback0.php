<?php
/* include db connection file */
include 'dbconn.php';

$conn = Connect();
	/* capture values from HTML form */
	$f_name = $_POST['f_name'];
	$f_email = $_POST['f_email'];
	$f_feeds= $_POST['f_feeds'];
	/* execute SQL INSERT command */

		$query = "INSERT INTO feeds (f_name, f_email, f_feeds) 
		VALUES ('".$f_name."', '".$f_email."', '".$f_feeds."')";
				
		$success = $conn->query($query);

		if(!$success)
		{
			die("Could not enter data: ".$conn->error);

		}

		header("Location: feedback.php");

		$conn->close();
?>