<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `movie`,`type`,`certificate`,`language` WHERE movie_certificate_id = certificate_id AND movie_type_id = type_id AND movie_language_id = language_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_attandance(attandance_id)
{
	if(confirm("Do you want to delete the attandance?"))
	{
		this.document.frm_attandance.attandance_id.value=attandance_id;
		this.document.frm_attandance.act.value="delete_attandance";
		this.document.frm_attandance.submit();
	}
}
	
		
function openBooking(movie_id) {
	window.location.href= "book-ticket.php?movie_id="+movie_id;
}

</script>

	<div class="crumb">
    </div>
    <div class="clear"></div>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_attandance" action="lib/attandance.php" method="post">
				<div class="static">
					<ul class="nospace listing">
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					<li class="product-listing" style="text-align:center;">
						<div class="imgl borderedbox">
							<div class="movie_title"><?=$data['movie_name']?></div>
							<div style="margin-bottom:10px;">
								<img src="uploads/<?=$data['movie_image']?>" style="height:175px; width:160px;">
							</div>
						</div>
						<div class="product-price" style="text-align:center;">
							<input type="button" value="Book Ticket" class="simplebtn" onClick="openBooking(<?=$data['movie_id']?>)">
						</div>
					</li>
					<?php } ?>
				</ul>	
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="attandance_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
