	<?php 
	ob_start();
	include_once("includes/header.php"); 
	global $movie_price;
	if($_SESSION['login'] != 1)
	{
		header("Location:login.php?msg=Login to your account to book the ticket !!!");
		echo "Hello";
		exit;
	}
?> 
<script>

jQuery(functions() {
	jQuery( "#booking_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+0",
	   dateFormat: 'd MM,yy'
	});
	jQuery('#frm_booking').validate({
		rules: {
			booking_confirm_password: {
				equalTo: '#booking_password'
			}
		}
	});
});
function validateForm(obj) {
	if(validateEmail(obj.booking_email.value))
		return true;
	jQuery('#error-msg').show();
	return false;
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Book Movie Ticket</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/booking.php" enctype="multipart/form-data" method="post" name="frm_booking" onsubmit="return validateForm(this)">
					<ul class="forms">
						<li class="txt">Date</li>
						<li class="inputfield"><input name="booking_date" id="booking_date" type="text" class="bar" required value="<?=$data[booking_dob]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="inputfield" style="color:#FF0000; font-size:12px; font-weight:bold">Cost of ticket <?=$movie_price?> each</li>
					</ul>
					<ul class="forms">
						<li class="txt">No. of Seats</li>
						<li class="inputfield"><input name="booking_no_seats" type="text" class="bar" required value="<?=$data[booking_no_seats]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Time</li>
						<li class="inputfield">
							<select name="booking_show_id" class="bar" required/>
								<?php echo get_new_optionlist("time","time_id","time_title",$data[booking_time]); ?>
							</select>
						</li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Book Ticket" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_booking">
					<input type="hidden" name="booking_movie_id" value="<?=$_REQUEST[movie_id]?>">
					<input type="hidden" name="booking_id" value="<?=$data[booking_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[booking_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr">Profile of <?=$data['booking_name']?></h4>
				<div><img src="<?=$SERVER_PATH.'uploads/'.$data[booking_image]?>" style="width: 250px"></div><br>
			</div> 
			<?php } ?>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php
	if($_SESSION['booking_details']['booking_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#booking_level_id" ).val(3);
		jQuery( "#booking_level" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?> 
