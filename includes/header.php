<?php
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
	ini_set("display_errors",1);
	error_reporting(E_ERROR);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movie Port- A Portal for Your Movies.</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="./css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="./css/slider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<script type="text/javascript" src="./js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="./js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="./js/anythingslider.js"></script>
<script type="text/javascript" src="./js/animatedcollapse.js"></script>
<script type="text/javascript" src="./js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script type="text/javascript" src="./js/contentslider.js"></script>
<script type="text/javascript" src="./js/ddaccordion.js"></script>
<script type="text/javascript" src="./js/acrodin.js"></script>
<script type="text/javascript" src="./js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="./js/lightbox.js"></script>
<script type="text/javascript" src="./js/menu-collapsed.js"></script>
<script type="text/javascript" src="./js/cufon-yui.js"></script>
<script type="text/javascript" src="./js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="./js/cufon.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
</head>

<body>
<div id="wrapper_sec">
	<div id="masthead">
    	<div class="logo">
        	<a href="./index.php" class="logo-custom">Movie Port - A Portal for Your Movies.</a>
        </div>
        <div class="slogan"></div>
        <div class="clear"></div>
            <div class="navigation">
            	<div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="./index.php">Home</a>
					<li><a href="./about.php">About Project</a></li>

					<?php if($_SESSION['login'] != 1) {?>
						<li><a href="./movies.php">All Movies</a></li>
						<li><a href="./movie-list.php">Book Ticket</a></li>
						<li><a href="./user.php">Register</a>
						<li><a href="./login.php">Login</a></li>
						<li><a href="./contact.php">Contact Us</a></li>
					<?php } ?>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
						<li><a href="./login-home.php">Dashboard</a></li>
						<li><a href="#">Administration</a>
							<ul>
								<li><a href="./movie.php">Add Movie</a></li>
								<li><a href="./certificate.php">Add Certificate</a></li>
								<li><a href="./language.php">Add Language</a></li>
								<li><a href="./type.php">Add Movie Type</a></li>
							</ul>
						</li>
						<li><a href="#">Reports</a>
							<ul>
								<li><a href="./movie-report.php">Movie Report</a></li>
								<li><a href="./certificate-report.php">Certificate Report</a></li>
								<li><a href="./language-report.php">Language Report</a></li>
								<li><a href="./type-report.php">Movie Type Report</a></li>
								<li><a href="./booking-report.php">Booking Report</a></li>
							</ul>
						</li>
						<li><a href="./user.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Account</a></li>
						<li><a href="./change-password.php">Change Password</a></li>
						<li><a href="./lib/login.php?act=logout">Logout</a></li>
					<?php } ?>
					<?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
						<li><a href="./login-home.php">Dashboard</a></li>
						<li><a href="./movie-list.php">Book Ticket</a></li>
						<li><a href="./booking-report.php">My Bookings</a></li>
						<li><a href="./user.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Account</a></li>
						<li><a href="./change-password.php">Change Password</a></li>
						<li><a href="./lib/login.php?act=logout">Logout</a></li>
					<?php } ?>
                    </ul>
                    <br style="clear: left" />
                    </div>
            </div>
    </div>
