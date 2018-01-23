<!DOCTYPE html>
<?php
  include "dbconn.php";
  $conn = Connect();
  session_start();
  if(!$_SESSION['nur_id'])
  { header("Location: logout.php");}
  $id = $_SESSION['nur_id'];
  $id2 = $_SESSION['nur_name'];

  $cu = "SELECT * from nursery where nur_id = '$id'";
  $result = mysqli_query($conn, $cu) or die(mysqli_error());

  while($row = mysqli_fetch_array($result)){
	$nur_name = $row['nur_name'];
	$nur_address= $row['nur_address'];
	$nur_post= $row['nur_post'];
	$nur_city= $row['nur_city'];
	$nur_state= $row['nur_state'];
	$nur_phone = $row['nur_phone'];
	$nur_email = $row['nur_email'];
	$nur_web = $row['nur_web'];
	$nur_operation= $row['nur_operation'];
	$n_password = $row['n_password'];
    }
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
							<a href="index.html"></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="addplant.php"><i class="fa fa-crosshairs"></i> Add Plant</a></li>
								<li><a href="listplant.php"><i class="fa fa-star"></i> List Plant</a></li>
								<li><a href="logout.php" Onclick='return ConfirmDelete3();'><i class="fa fa-lock"></i> Logout</a>
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
				<form name="update" action="update0.php" method="post">
				<table class="table table-condensed">
					<thead>
						
						<tr>
							<center><h4><b>Account</b></h4></center>
						</tr>
					
					</thead>
					<hr>
					<tbody>

						<tr>
							<td><h4><p><b><?php echo 'Nursery Name'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_name; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Address'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">:</font></b></td>
								<td><p><h4><?php echo $nur_address; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Postcode'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_post; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'City'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_city; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'State'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_state; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Phone Number'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_phone; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Email'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_email; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Website'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_web; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Operation Hours'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $nur_operation; ?></h4></p></td>
						</tr>

						<tr>
							<td><h4><p><b><?php echo 'Password'; ?></b></p></h4></td>
								<td><b><font color="#FE980F">: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</font></b></td>
								<td><p><h4><?php echo $n_password; ?></h4></p></td>
						</tr>

					</tbody>
				</table>
				<hr>
				<center><button type="submit" name="Submit" class="btn btn-default">Update</button>
						</center>
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
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>