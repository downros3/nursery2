<?php

include 'dbconn.php';

$conn = Connect();

$id = $_GET["id"];

$sql = "DELETE FROM plant WHERE p_id = '$id'";
		
$query = mysqli_query($conn, $sql);

if($query)
{
	header("Location: listplant.php");
}
CloseCon($conn);
?>
