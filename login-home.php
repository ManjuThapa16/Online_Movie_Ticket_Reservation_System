<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
					<h4 class="heading colr">Welcome to Online Movie Ticket Booking System</h4>
					<ul class='login-home-listing'>
						<?php if($_SESSION['user_details']['user_level_id'] == 3) {?>
							<li><a href="./movie-list.php">Book Movie</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
							<li><a href="./movie.php">Add Movie</a></li>
							<li><a href="./certificate.php">Add Certificate</a></li>
							<li><a href="./language.php">Add Language</a></li>
							<li><a href="./type.php">Add Movie Type</a></li>
							<li><a href="./movie-report.php">Movie Report</a></li>
							<li><a href="./certificate-report.php">Certificate Report</a></li>
							<li><a href="./language-report.php">Language Report</a></li>
							<li><a href="./type-report.php">Movie Type Report</a></li>
							<li><a href="./booking-report.php">Booking Report</a></li>								
							<li><a href="./user.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Account</a></li>
							<li><a href="./change-password.php">Change Password</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
						<?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
							<li><a href="./movie-list.php">Book Ticket</a></li>
							<li><a href="./booking-report.php">My Bookings</a></li>
							<li><a href="./user.php?user_id=<?=$_SESSION['user_details']['user_id']?>">My Account</a></li>
							<li><a href="./change-password.php">Change Password</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 

