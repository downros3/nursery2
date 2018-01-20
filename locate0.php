<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyC5BPeUgtGi2wumDqSv4FsmabRAXQsuebE&sensor=true&libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


    <script>

      var initMap = function() {

    var map,
        directionsService, directionsDisplay,
        autoSrc, autoDest, pinA, pinB,

        markerA = new google.maps.MarkerImage('m1.png',
            new google.maps.Size(24, 27),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 27)),
        markerB = new google.maps.MarkerImage('m2.png',
            new google.maps.Size(24, 28),
            new google.maps.Point(0, 0),
            new google.maps.Point(12, 28)),

        // Caching the Selectors		
        $Selectors = {
            mapCanvas: jQuery('#mapCanvas')[0],
            dirPanel: jQuery('#directionsPanel'),
            dirInputs: jQuery('.directionInputs'),
            dirSrc: jQuery('#dirSource'),
            dirDst: jQuery('#dirDestination'),
            getDirBtn: jQuery('#getDirections'),
            dirSteps: jQuery('#directionSteps'),
            paneToggle: jQuery('#paneToggle'),
            useGPSBtn: jQuery('#useGPS'),
            paneResetBtn: jQuery('#paneReset')
        };

    function autoCompleteSetup() {
        autoSrc = new google.maps.places.Autocomplete($Selectors.dirSrc[0]);
        autoDest = new google.maps.places.Autocomplete($Selectors.dirDst[0]);
    } // autoCompleteSetup Ends

    function directionsSetup() {
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer({
            suppressMarkers: true
        });

        directionsDisplay.setPanel($Selectors.dirSteps[0]);
    } // direstionsSetup Ends

    function trafficSetup() {
        // Creating a Custom Control and appending it to the map
        var controlDiv = document.createElement('div'),
            controlUI = document.createElement('div'),
            trafficLayer = new google.maps.TrafficLayer();

        jQuery(controlDiv).addClass('gmap-control-container').addClass('gmnoprint');
        jQuery(controlUI).text('Traffic').addClass('gmap-control');
        jQuery(controlDiv).append(controlUI);

        // Traffic Btn Click Event	  
        google.maps.event.addDomListener(controlUI, 'click', function() {
            if (typeof trafficLayer.getMap() == 'undefined' || trafficLayer.getMap() === null) {
                jQuery(controlUI).addClass('gmap-control-active');
                trafficLayer.setMap(map);
            } else {
                trafficLayer.setMap(null);
                jQuery(controlUI).removeClass('gmap-control-active');
            }
        });
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);
    } // trafficSetup Ends

    function mapSetup() {
        map = new google.maps.Map($Selectors.mapCanvas, {
            zoom: 10,
            center: new google.maps.LatLng(2.1944, 102.2491),

            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DEFAULT,
                position: google.maps.ControlPosition.TOP_RIGHT
            },

            panControl: true,
            panControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },

            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.LARGE,
                position: google.maps.ControlPosition.RIGHT_TOP
            },

            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true,

            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        autoCompleteSetup();
        directionsSetup();
        trafficSetup();
    } // mapSetup Ends 

    function directionsRender(source, destination) {
        $Selectors.dirSteps.find('.msg').hide();
        directionsDisplay.setMap(map);

        var request = {
            origin: source,
            destination: destination,
            provideRouteAlternatives: false,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {

                directionsDisplay.setDirections(response);

                var _route = response.routes[0].legs[0];

                pinA = new google.maps.Marker({ position: _route.start_location, map: map, icon: markerA }),
                    pinB = new google.maps.Marker({ position: _route.end_location, map: map, icon: markerB });
            }
        });
    } // directionsRender Ends

    function fetchAddress(p) {
        var Position = new google.maps.LatLng(p.coords.latitude, p.coords.longitude),
            Locater = new google.maps.Geocoder();

        Locater.geocode({ 'latLng': Position }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var _r = results[0];
                $Selectors.dirSrc.val(_r.formatted_address);
            }
        });
    } // fetchAddress Ends

    function invokeEvents() {
        // Get Directions
        $Selectors.getDirBtn.on('click', function(e) {
            e.preventDefault();
            var src = $Selectors.dirSrc.val(),
                dst = $Selectors.dirDst.val();

            directionsRender(src, dst);
        });

        // Reset Btn
        $Selectors.paneResetBtn.on('click', function(e) {
            $Selectors.dirSteps.html('');
            $Selectors.dirSrc.val('');
            $Selectors.dirDst.val('');

            if (pinA) pinA.setMap(null);
            if (pinB) pinB.setMap(null);

            directionsDisplay.setMap(null);
        });

        // Toggle Btn
        $Selectors.paneToggle.toggle(function(e) {
            $Selectors.dirPanel.animate({ 'left': '-=305px' });
            jQuery(this).html('&gt;');
        }, function() {
            $Selectors.dirPanel.animate({ 'left': '+=305px' });
            jQuery(this).html('&lt;');
        });

        // Use My Location / Geo Location Btn
        $Selectors.useGPSBtn.on('click', function(e) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    fetchAddress(position);
                });
            }
        });
    } //invokeEvents Ends 

    mapSetup();
    invokeEvents();
};
    </script>
<style type="text/css">
      #mapCanvas {
        width: 500px;
        height: 400px;
        margin-top: 10px;
      }
    </style>
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
							<a href="index.php"></a>
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
						<h2 class="title text-center">Map to Nursery</h2>
<div id="mapCanvas">&#160;</div>
    <div id="directionsPanel">
        <a href="#geoLocation" id="useGPS">Use My Location</a>
        <p class="or">[OR]</p>
        <div class="directionInputs">
            <form>
                <p>
                    <label>A</label>
                    <input type="text" value="" id="dirSource" />
                </p>
                <p>
                    <label>B</label>
                    <input type="text" value="" id="dirDestination" />
                </p>
                <a href="#getDirections" id="getDirections">Get Directions</a>
                <a href="#reset" id="paneReset">Reset</a>
            </form>
        </div>
        <div id="directionSteps">
            <p class="msg">Direction Steps Will Render Here</p>
        </div>
        <a href="#toggleBtn" id="paneToggle" class="out">&lt;</a>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw6r6EFekz3p32EHqi7n4o07F5Z2CTnf8&callback=init&libraries=places&sensor=false" async defer></script>
    <script src="directions.js"></script>
    <script>
    function init() {
        initMap();
    }
    </script>
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