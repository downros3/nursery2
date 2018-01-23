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
	$p_name1 = $_POST['p_name1'];
	$p_name2 = $_POST['p_name2'];
	$p_name3 = $_POST['p_name3'];
	$p_name4 = $_POST['p_name4'];
	$p_price = $_POST['p_price'];


	$name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            $sql = "UPDATE plant SET nur_id = '$nur_id' WHERE nur_id = $nur_id";

			$query1 = mysqli_query($conn, $sql) or die ("Error: " . mysql_error());

            // Insert record
            $query = "insert into plant(p_name1, p_name2, p_name3, p_name4, p_price, nur_id,name,image) values('".$p_name1."', '".$p_name2."', '".$p_name3."', '".$p_name4."', '".$p_price."', $nur_id,'".$name."','".$image."')";
           
            mysqli_query($conn,$query) or die(mysqli_error($conn));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

            header("Location: addplant.php");
        }
		

}


		CloseCon($conn);

?>  

<?php
}
else{
	header("Location: index.php");}

?>