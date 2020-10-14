<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	if($_SESSION['user_details']['user_level_id'] == 2)
	{
		$SQL = "SELECT * FROM booking, user, `time`, movie WHERE booking_user_id = user_id AND booking_movie_id = movie_id AND booking_show_id = time_id AND booking_user_id = ".$_SESSION[user_details][user_id];
	}
	else
	{
		$SQL = "SELECT * FROM booking, user, `time`, movie WHERE booking_user_id = user_id AND booking_movie_id = movie_id AND booking_show_id = time_id";
	}
	$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_category(category_id)
{
	if(confirm("Do you want to delete the category?"))
	{
		this.document.frm_category.category_id.value=category_id;
		this.document.frm_category.act.value="delete_category";
		this.document.frm_category.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Booking Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_category" action="lib/category.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">Booking ID</td>
						<td scope="col">Movie</td>
						<td scope="col">Movie Name</td>
						<td scope="col">Customer Name</td>
						<td scope="col">Email</td>
						<td scope="col">Mobile</td>
						<td scope="col">No. Seats</td>
						<td scope="col">Show</td>
						<td scope="col">Total Amount</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td>10000<?=$data[booking_id]?></td>
						<td><img src="uploads/<?=$data['movie_image']?>" style="width:50px;"></td>
						<td><?=$data[movie_name]?></td>
						<td><?=$data[user_name]?></td>
						<td><?=$data[user_email]?></td>
						<td><?=$data[user_mobile]?></td>
						<td><?=$data[booking_no_seats]?> Seats</td>
						<td><?=$data[time_title]?></td>
						<td><?=$data[booking_amount]?>/-</td>
						<td style="text-align:center">
							<a href="booking-confirmation.php?booking_id=<?php echo $data[booking_id] ?>">View</a></td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="category_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 