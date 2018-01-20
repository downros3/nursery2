<?php
   session_start();
  if(isset($_SESSION['nur_id'])){
?>

<?php
include 'dbconn.php';

$conn = Connect();

  $nur_id = $_SESSION['nur_id'];
  

/* update process */
if(isset($_POST['Submit'])){
	$p_id = $_POST['p_id'];
	$p_name1 = $_POST['p_name1'];
	$p_name2 = $_POST['p_name2'];
	$p_name3 = $_POST['p_name3'];
	$p_name4 = $_POST['p_name4'];
	$p_price = $_POST['p_price'];
	
	$sql = "UPDATE plant SET
			p_name1 = '$p_name1',
			p_name2 = '$p_name2',
			p_name3 = '$p_name3',
			p_name4 = '$p_name4',
			p_price = '$p_price'
			WHERE p_id = '$p_id'";
			
	$query = mysqli_query($conn, $sql) or die ("Error: " . mysql_error());
	
	header("Location: listplant.php");
}
 



CloseCon($conn);
?>

<?php
}
else{
	header("Location: index.php");}

?>

