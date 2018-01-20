<?php 
include('dbconn.php');  // database connection

$conn = Connect();

 if(isset($_POST['Submit']))
{
    if(!empty($_POST['nur_email']) AND !empty($_POST['n_password'])) 
    {
        session_start();
        $nur_email=$_POST['nur_email'];
        $n_password=$_POST['n_password'];
       
       $login="SELECT * FROM nursery WHERE nur_email= '$nur_email' AND n_password='$n_password'";
       
            $result_login = mysqli_query($conn, $login);
            $row= $result_login->fetch_array();
            if(!empty($row['nur_email']) AND !empty($row['n_password']))
            {
                $_SESSION['nur_name'] = $row['nur_name'];
                $_SESSION['nur_id'] = $row['nur_id'];
                header("location:index0.php");
            }
        
            else
            {
                echo "You enter the wrong email or passowrd";
            header("location:index.html");
            }
        
    }   //close if check form
} //close if submit button
 
CloseCon($conn); 
 
?>