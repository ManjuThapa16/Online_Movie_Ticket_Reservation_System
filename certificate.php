<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[certificate_id])
	{
		$SQL="SELECT * FROM `certificate` WHERE certificate_id = $_REQUEST[certificate_id]";
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
				<h4 class="heading colr">Movie Certificate Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/certificate.php" enctype="multipart/form-data" method="post" name="frm_certificate">
					<ul class="forms">
						<li class="txt">Certificate Name</li>
						<li class="inputfield"><input name="certificate_name" id="certificate_name" type="text" class="bar" required value="<?=$data[certificate_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Description</li>
						<li class="textfield"><textarea name="certificate_description" cols="" rows="6" required><?=$data[certificate_description]?></textarea></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_certificate">
					<input type="hidden" name="certificate_id" value="<?=$data[certificate_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 