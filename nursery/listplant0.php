<!DOCTYPE html>
<?php
  session_start();
  if(!$_SESSION['nur_id'])
  { header("Location: logout.php");}
  $id = $_SESSION['nur_id'];
  $id2 = $_SESSION['nur_name'];
 ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nursery Recommendation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <script type="text/javascript">
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to update?");
      if (x)
          return true;
      else
        return false;
    }
</script> 

   <script type="text/javascript">
    function ConfirmDelete2()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>

   <script type="text/javascript">
    function ConfirmDelete3()
    {
      var x = confirm("Are you sure you want to log out?");
      if (x)
          return true;
      else
        return false;
    }
</script>  


</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html" ></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="addplant.php"><i class="fa fa-crosshairs"></i> Add Plant</a></li>
								<li><a href="listplant.php"><i class="fa fa-star"></i> List Plant</a></li>
								<li><a href="logout.php" Onclick='return ConfirmDelete3();'><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index0.php">Home</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<form name="update" action="updatedelete.php" method="post">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Plant Picture</td>
							<td class="image"></td>
							<td class="description">Plant Name</td>
							<td class="price">Price</td>
							<td class="quantity">Update</td>
							<td class="total">Delete</td>
							<td></td>
						</tr>
					</thead>
					
					<tbody>
						
						<tr>
							<?php

							  include "dbconn.php";
							  $conn = Connect();

							  $id2 = $_GET["id"];

 							$cu = "SELECT * from plant where p_id = '$id2'";
  							$result = mysqli_query($conn, $cu) or die(mysqli_error());

  						while($row = mysqli_fetch_array($result)){

						        $p_name1 = $row['p_name1'];
						        $p_name2= $row['p_name2'];
						        $p_name3 = $row['p_name3'];
						        $p_name4 = $row['p_name4'];
							$p_price = $row['p_price'];
							$p_id = $row['p_id'];
						   

					echo "<form name=update action=updatedelete.php method=post>";
						echo "<tr>";
							echo "<td class=cart_product>
								<p><img width=150 height=150 src='images/home/teo/hugehibiscus.jpg' /></p>

								
							</td>";
							
							echo "<td class=cart_description>
								<h4>Plant id:</h4>
								<h4><input name =p_id type=readonly size =10 value=".$p_id." readonly></h4>
							</td>";

							echo  "<td class=cart_price>
								<p>Scientific name (english):<input name =p_name1 type=text size =10 value=".$p_name1."></p>
								<p>Common name (english):<input name =p_name2 type=text size =10 value=".$p_name2."></p>
								<p>Scientific name (malay):<input name =p_name3 type=text size =10 value=".$p_name3."></p>
								<p>Common name (malay):<input name =p_name4 type=text size =10 value=".$p_name4."></p>
							</td>";

							echo "<td class=cart_total>
								<p class=cart_total_price><input name =p_price type=text size =1 value=".$p_price."></p>
							</td>";

							echo "<td class=cart_quantity>
								<button Onclick='return ConfirmDelete();' type=Submit name=Submit class=btn btn-default >Update</button>
							</td>";

					echo "</form>";

							echo "<td class=cart_delete>
								<a href=delete0.php?id=".$p_id." Onclick='return ConfirmDelete2();'>X</a>
							</td>";
						}
							?>
						</tr>
					</tbody>
				</table>

			</form>
			</div>
		</div>
	</section> <!--/#cart_items-->

	

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<br><br><br>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		<br>
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>