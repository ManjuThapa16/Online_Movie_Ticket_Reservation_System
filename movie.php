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
	if($data['movie_level_id'] == 1) $heading = "System Movie";
	if($data['movie_level_id'] == 2) $heading = "Customer";
?> 
<script>

jQuery(function() {
	jQuery( "#movie_release_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-1:+1",
	   dateFormat: 'd MM,yy'
	});
	jQuery( "#movie_end_date" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-1:+1",
	   dateFormat: 'd MM,yy'
	});
});
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Movie Add Form</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<form action="lib/movie.php" enctype="multipart/form-data" method="post" name="frm_movie">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="movie_name" type="text" class="bar" required value="<?=$data[movie_name]?>"/></li>
					</ul>
					<ul class="forms" id="movie_level">
						<li class="txt">Movie Certificate</li>
						<li class="inputfield">
							<select name="movie_certificate_id" id="movie_level_id" class="bar" required/>
								<?php echo get_new_optionlist("certificate","certificate_id","certificate_name",$data[movie_certificate_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms" id="movie_level">
						<li class="txt">Movie Language</li>
						<li class="inputfield">
							<select name="movie_language_id" id="movie_language_id" class="bar" required/>
								<?php echo get_new_optionlist("language","language_id","language_name",$data[movie_language_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms" id="movie_level">
						<li class="txt">Movie Type</li>
						<li class="inputfield">
							<select name="movie_type_id" id="movie_type_id" class="bar" required/>
								<?php echo get_new_optionlist("type","type_id","type_name",$data[movie_type_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Duration</li>
						<li class="inputfield"><input name="movie_duration" type="text" class="bar" required value="<?=$data[movie_duration]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Director</li>
						<li class="inputfield"><input name="movie_director" id="movie_director" type="text" class="bar" required value="<?=$data[movie_director]?>" onchange="validateEmail(this)" /></li>
					</ul>
					<ul class="forms">
						<li class="txt">Castings</li>
						<li class="inputfield"><input name="movie_cast" id="movie_cast" type="text" class="bar" required value="<?=$data[movie_cast]?>" onchange="validateEmail(this)" /></li>
					</ul>
					<ul class="forms">
						<li class="txt">Release Date</li>
						<li class="inputfield"><input name="movie_release_date" id="movie_release_date" type="text" class="bar" required value="<?=$data[movie_release_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Premier Date</li>
						<li class="inputfield"><input name="movie_end_date" id="movie_end_date" type="text" class="bar" required value="<?=$data[movie_end_date]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Trailer Embed</li>
						<li class="textfield"><textarea name="movie_trailer_url"><?=$data[movie_trailer_url]?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="movie_description" required><?=$data[movie_description]?></textarea></li>
					</ul>
					<ul class="forms">
						<li class="txt">Photo</li>
						<li class="inputfield"><input name="movie_image" type="file" class="bar"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_movie">
					<input type="hidden" name="avail_image" value="<?=$data[movie_image]?>">
					<input type="hidden" name="movie_id" value="<?=$data[movie_id]?>">
				</form>
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
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 