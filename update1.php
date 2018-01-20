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
	$nur_name = $_POST['nur_name'];
	$nur_address= $_POST['nur_address'];
	$nur_post= $_POST['nur_post'];
	$nur_city= $_POST['nur_city'];
	$nur_state= $_POST['nur_state'];
	$nur_phone = $_POST['nur_phone'];
	$nur_email = $_POST['nur_email'];
	$nur_web = $_POST['nur_web'];
	$nur_operation= $_POST['nur_operation'];
	$n_password = $_POST['n_password'];
	
	$sql = "UPDATE nursery SET
			nur_name = '$nur_name',
			nur_address= '$nur_address',
			nur_post= '$nur_post',
			nur_city= '$nur_city',
			nur_state= '$nur_state',
			nur_phone = '$nur_phone',
			nur_email = '$nur_email',
			nur_web = '$nur_web',
			nur_operation= '$nur_operation',
			n_password = '$n_password' 
			WHERE nur_id = $nur_id";
			
	$query = mysqli_query($conn, $sql) or die ("Error: " . mysql_error());
	
	header("Location: account.php");
}
CloseCon($conn);
?>

<?php
}
else{
	header("Location: index.php");}

?>
