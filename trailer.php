<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[movie_id])
	{
		$SQL="SELECT * FROM movie WHERE movie_id = $_REQUEST[movie_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
	if($_REQUEST['type'])
	{
		$data[movie_level_id] = $_REQUEST['type'];
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Trailer of <?=$data['movie_name']?></h4>
				<?=$data['movie_trailer_url']?>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[movie_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr"><?=$data['movie_name']?></h4>
				<div><img src="<?=$SERVER_PATH.'uploads/'.$data[movie_image]?>" style="width: 250px"></div><br>
			</div> 
			<?php } ?>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 