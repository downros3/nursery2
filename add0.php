<?php
   session_start();
  if(isset($_SESSION['nur_id'])){
?>

<?php
/* include db connection file */
include 'dbconn.php';

$conn = Connect();

  $nur_id = $_SESSION['nur_id'];


if(isset($_POST["Submit"]))
{ 	
	$imgData =addslashes (file_get_contents($_FILES['userfile']));
	/* capture values from HTML form */
	$p_name1 = $_POST['p_name1'];
	$p_name2 = $_POST['p_name2'];
	$p_name3 = $_POST['p_name3'];
	$p_name4 = $_POST['p_name4'];
	$p_price = $_POST['p_price'];

	/*
	$ic = "SELECT * FROM customer WHERE cust_ic = '".$cust_ic."'";
	$result = mysqli_query($conn, $ic);
	if(mysqli_num_rows($result)>=1)
	{
		echo"ic number already exsited";
	}
		
	else {	
		*/

	/* execute SQL INSERT command */

		$sql = "UPDATE plant SET nur_id = '$nur_id' WHERE nur_id = $nur_id";

		$query = mysqli_query($conn, $sql) or die ("Error: " . mysql_error());

		$query = "INSERT INTO plant (p_name1, p_name2, p_name3, p_name4, p_price, nur_id, image) VALUES ('".$p_name1."', '".$p_name2."', '".$p_name3."', '".$p_name4."', '".$p_price."', $nur_id, '".$imgData."')";
		
		$success = $conn->query($query);

		if(!$success)
		{
			die("Could not enter data: ".$conn->error);

		}

		header("Location: addplant.php");
	
}


		CloseCon($conn);

?>  

<?php
}
else{
	header("Location: index.php");}

?>