<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM movie,certificate,language,type WHERE movie_language_id = language_id AND movie_certificate_id = certificate_id AND movie_type_id = type_id";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
	global $SERVER_PATH;
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
			<h4 class="heading colr">All Available Movies</h4>
			<div class="news" style="width:100%">
            <ul style="width:100%">
			<?php while($data = mysqli_fetch_assoc($rs)) {?>
				<li style="width:294px; margin-right: 15px;">
                	<h6 class="last"><?=$data['movie_name']?></h6>
                    <a href="movie_details.php?movie_id=<?=$data[movie_id]?>" class="thumb"><img src="<?=$SERVER_PATH.'uploads/'.$data[movie_image]?>" alt="" style="width:266px;"/></a>
                    <p><?=substr($data['movie_description'],0,150)?></p>
                    <div class="news_links">
                    	<a href="#" class="readmore left">Read More</a>
                    </div>
                </li>
			<?php } ?>
			</ul>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 