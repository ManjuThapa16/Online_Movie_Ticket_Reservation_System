<?php 
	include_once("includes/header.php"); 
	
	/// Update the booking status /////
	$SQL = "UPDATE booking SET booking_status = 1 WHERE booking_id = '$_REQUEST[booking_id]'";
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	/// Get the booking details /////
	$SQL = "SELECT * FROM booking, user, `time`, movie WHERE booking_user_id = user_id AND booking_movie_id = movie_id AND booking_show_id = time_id AND booking_id = '$_REQUEST[booking_id]'";
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
	$data = mysqli_fetch_assoc($rs);	
?> 
<style>
td{
	padding:5px;
	text-align:center;
	boder:1px solid;
	margin:1px;
	border:1px solid #101746;
}
th {
	font-weight:bold;
	color:#ffffff;
	font-size:12px;
	background-color:#bf3c22;
	padding:5px;
}
</style>
	<div class="crumb">
  
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Movie Booking Receipt (Your booking was successfull !!!)</h4>
				<div>
				<table style="border:1px solid; width:100%">
							<tr>
								<th>Booking Refrence ID</th>
								<td>10000<?=$data[booking_id]?></td>
							</tr>
							<tr>
								<th>Booking Date</th>
								<td><?=$data[booking_date]?></td>
							</tr>
							<tr>
								<th>Name</th>
								<td><?=$data[user_name]?></td>
							</tr>
							<tr>
								<th>Mobile</th>
								<td><?=$data[user_mobile]?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?=$data[user_email]?></td>
							</tr>
							<tr>
								<th>Movie Name</th>
								<td><?=$data[movie_name]?></td>
							</tr>
							<tr>
								<th>Show</th>
								<td><?=$data[time_title]?></td>
							</tr>
							<tr>
								<th>Number of Seats</th>
								<td><?=$data[booking_no_seats]?> Seats</td>
							</tr>
							<tr>
								<th>Total Amount Paid</th>
								<td><?=$data[booking_amount]?>/-</td>
							</tr>
						</table>
						<ul class="forms" style="float:right; margin-top:20px;">
							<li class="textfield"><input type="button" value="Print Ticket" class="simplebtn" onClick="window.print()"></li>
						</ul>
				</div>
			</div>
		</div>
		<div class="col2">
			<div class="contactfinder">
				<h4 class="heading colr">Where to find us.</h4>
				<a href="#" class="mapcont"><img src="./images/map.gif" alt="" style="width:250px;"/></a>
				<h4>Get in touch</h4>
				<p>
					You’ll find us offices sitting right in <br />
					the town centre in the middle of Guildford, Surrey.<br />
					<br />
					171 abc Street<br />
					Lipsum<br />
					Lorem<br />
					GU5 3AB<br />
					<br /><br />
					+44 (0)2563 586215<br />
					<a href="">info@lipsum.com</a><br />
				</p>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 