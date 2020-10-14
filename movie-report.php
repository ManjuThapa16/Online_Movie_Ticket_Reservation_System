<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM movie,certificate,language,type WHERE movie_language_id = language_id AND movie_certificate_id = certificate_id AND movie_type_id = type_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?>
<script>
function delete_movie(movie_id)
{
	if(confirm("Do you want to delete the movie?"))
	{
		this.document.frm_movie.movie_id.value=movie_id;
		this.document.frm_movie.act.value="delete_movie";
		this.document.frm_movie.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">All Movie Reports</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_movie" action="lib/movie.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
						<td scope="col">Sr. No.</td>
						<td scope="col">Image</td>
						<td scope="col">Name</td>
						<td scope="col">Language</td>
						<td scope="col">Type</td>
						<td scope="col">Certificate</td>
						<td scope="col">Director</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
						<td><img src="<?=$SERVER_PATH.'uploads/'.$data[movie_image]?>" style="heigh:50px; width:50px"></td>
						<td><?=$data[movie_name]?></td>
						<td><?=$data[language_name]?></td>
						<td><?=$data[type_name]?></td>
						<td><?=$data[certificate_name]?></td>
						<td><?=$data[movie_director]?></td>
						<td style="text-align:center"><a href="movie.php?movie_id=<?php echo $data[movie_id] ?>">Edit</a> | <a href="Javascript:delete_movie(<?=$data[movie_id]?>)">Delete</a> </td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="movie_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 