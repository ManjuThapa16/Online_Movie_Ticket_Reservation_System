<?php 
	include_once("includes/header.php"); 
	$R = $_REQUEST;
	global $movie_price;
	$totalCost = $movie_price * $R['booking_no_seats'];
	//$SQL = "SELECT * FROM book WHERE book_id = '$_REQUEST[book_id]'";
	//$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	//$data = mysqli_fetch_assoc($rs);
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Make Payment</h4>
				<div style="color: #ff0000; font-size: 17px; font-weight: bold; margin: 10px;">Total Amount to be paid : <?=$totalCost?></div>
				<form action="booking-confirmation.php">
					<ul class="forms">
						<li class="txt">Card Number</li>
						<li class="inputfield"><input name="in" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Name on Card</li>
						<li class="inputfield"><input name="in" type="text" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Card Type</li>
						<li class="inputfield">
						 <select name = "credit_card_type" required>
							<option value="">Please Select</option>
							<option>MasterCard</option>
							<option>Visa Card</option>
							<option>Discover</option>
							<option>Maestro</option>
							<option>American Expresss</option>
						</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Card Expiry</li>
						<li class="inputfield">
						<select style="float:left; width:127px;">
							<option>Month</option>
							<option>January</option>
							<option>February</option>
							<option>March</option>
							<option>April</option>
							<option>May</option>
							<option>June</option>
							<option>July</option>
							<option>August</option>
							<option>September</option>
							<option>October</option>
							<option>November</option>
							<option>December</option>
						</select>
						<select name = "exp_year" required style="float:left; width:105px; margin-left:9px;">
							<option>Year</option>
							<?php for($i=2016; $i<=2030; $i++) { ?>
								<option value="<?=$i?>"><?=$i?></option>
							<?php } ?>
						</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">CVV Number</li>
						<li class="inputfield"><input name="in" type="password" class="bar" required/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Total Amount</li>
						<li class="inputfield"><input name="in" type="text" class="bar" required value="<?=$totalCost?>" readonly/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<input type="hidden" name="booking_id" value="<?=$R[booking_id]?>">
						<li class="textfield"><input type="submit" value="Make Payment" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
				</form>
			</div>
		</div>
		<div class="col2">
			<div class="contactfinder">
				<h4 class="heading colr">Make Payment Online</h4>
				<img src="./images/payment1.jpg" alt="" style="width:250px;"/>
				<img src="./images/payment2.jpg" alt="" style="width:250px;margin-top:20px;"/>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 