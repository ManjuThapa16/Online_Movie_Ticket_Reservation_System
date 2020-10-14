<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[language_id])
	{
		$SQL="SELECT * FROM `language` WHERE language_id = $_REQUEST[language_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Movie Language Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/language.php" enctype="multipart/form-data" method="post" name="frm_language">
					<ul class="forms">
						<li class="txt">Language Name</li>
						<li class="inputfield"><input name="language_name" id="language_name" type="text" class="bar" required value="<?=$data[language_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="language_description" cols="" rows="6" required><?=$data[language_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_language">
					<input type="hidden" name="language_id" value="<?=$data[language_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 