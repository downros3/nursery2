<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NURSERY</title>
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
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
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
								<li><a href="index.php" >Home</a></li>
								<li><a href="nursery.php" class="active">Nursery Recommendation</a></li>
								<li><a href="feedback.php">Feedback</a></li>
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
		
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Selection</h2>
						<div class="panel-group category-products" id="accordian"><!--selection-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									
										<font color="black">
											<form name="contact-form" method="post" action="nursery0.php">
										Search the plant:<br><br>
       										 <input type="text" name="p_name" class="form-control" required="required" placeholder="Plant Name"><br>
										    <input style ="font-family:  sans-serif; color: black;padding: 2px 2px;margin: 2px 0;border: none;border-radius: 2px;" name="Submit" type="Submit" value="Search">
										</form>
									</font>	

									</h4>
								</div>
							</div>
						</div><!--/selection-->
					</div>
				</div>
				

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">List of Nursery</h2>

				<?php
       											include 'dbconn.php';
      						 						$conn = Connect();

       											$cu = "SELECT * from nursery";
       											$result = mysqli_query($conn, $cu) or die(mysqli_error());



       										while($row = mysqli_fetch_array($result))
       										{
											
											$nur_id = $row['nur_id'];	
											$nur_name = $row['nur_name'];
											$nur_address= $row['nur_address'];
											$nur_post= $row['nur_post'];
											$nur_city= $row['nur_city'];
											$nur_state= $row['nur_state'];
											$nur_phone = $row['nur_phone'];
											$nur_email = $row['nur_email'];
											$nur_web = $row['nur_web'];
											$nur_operation= $row['nur_operation'];
							

       								echo "<div class='col-sm-4'>";
						echo	"<div class='product-image-wrapper'>";
						echo		"<div class='single-products'>";
						echo			"<div class='productinfo text-center'>";
						echo				"<img src='images/home/oasis/waterlily.jpg' />";
						echo					"<h2>".$nur_name."</h2>";
						echo			"<a href=locate0.php?id=".$nur_id." class='btn btn-default add-to-cart'><i class='fa fa-map-marker'></i>Get Direction</a>";
						echo			"</div>";
						echo			"<div class='product-overlay'>";
						echo				"<div class='overlay-content'>";
						echo					"<p>Adress:".$nur_address.", ".$nur_post." ".$nur_city.", ".$nur_state."</p>";
						echo					"<p>Operation Hours:".$nur_operation."</p><br><br>";
						echo					"<a href=locate0.php?id=".$nur_id." class='btn btn-default add-to-cart'><i class='fa fa-map-marker'>
												</i>Get direction</a>";
									echo	"</div>";
									echo "</div>";
								echo "</div>";
								echo "</div>";
							echo "</div>";
							}
						?>				
				</div>
			</div>
		</div>
	</div>
</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					
				</div>
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>