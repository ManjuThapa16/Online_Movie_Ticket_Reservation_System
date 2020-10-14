<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM movie,certificate,language,type WHERE movie_language_id = language_id AND movie_certificate_id = certificate_id AND movie_type_id = type_id AND movie_id = '$_REQUEST[movie_id]'";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	$data=mysqli_fetch_assoc($rs);
	global $SERVER_PATH;
?> 
<script>
function openBooking(movie_id) {
	window.location.href= "book-ticket.php?movie_id="+movie_id;
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
			<h4 class="heading colr">Details of Movie <?=$data['movie_name']?></h4>
        <div>
			<div style="float:left; border:3px solid #d71921; padding:1px; border-radius:3px;"><img src="<?=$SERVER_PATH.'uploads/'.$data[movie_image]?>" style="height:320px; width:300px;"></div>
			<div style="float:left; width:600px; margin-left:20px;" class="static">
				<table>
					<tr>
						<td class="tablehead" style="width:150px;">Name</td>
						<td><?=$data["movie_name"]?> &nbsp;&nbsp;&nbsp;(<a style="color:#ff0000; text-decoration:underline; font-weight:bold; font-size:12px;" href="trailer.php?movie_id=<?=$data['movie_id']?>">View Trailer</a>)</td>
					</tr>
					<tr>
						<td class="tablehead">Certificate</td>
						<td><?=$data["certificate_name"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Type</td>
						<td><?=$data["type_name"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Language</td>
						<td><?=$data["language_name"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Duration</td>
						<td><?=$data["movie_duration"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Director</td>
						<td><?=$data["movie_director"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Cast</td>
						<td><?=$data["movie_cast"]?></td>
					</tr>
					<tr>
						<td class="tablehead">Description</td>
						<td>
						<?=$data["movie_description"]?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<div class="product-price" style="text-align:center;">
							<input type="button" value="Book Ticket" class="simplebtn" onClick="openBooking(<?=$data['movie_id']?>)">
						</div>
						</td>
					</tr>
				</table>
			</div>
        </div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 