<?php
 include "dbconn.php";
 $conn = Connect();
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks

     // get the image from the db
     $sql = "SELECT * FROM test_image where id = '2'";

     // the result of the query
     $result = mysqli_query($conn,$sql) or die("Invalid query: " . mysqli_error());

     while($row = mysqli_fetch_array($result)){

                                      $id = $row['id'];
                                      $name= $row['name'];
                                      $image = $row['image'];


     header("Content-type: image/jpeg");
     echo $image;
     echo $id;
}

?>