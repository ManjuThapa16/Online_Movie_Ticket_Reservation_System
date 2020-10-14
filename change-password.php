<?php include_once("includes/header.php"); ?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
					<h4 class="heading colr">Change Your Account Password</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<form action="lib/login.php" method="post" name="frm_car">
						<ul class="forms">
							<li class="txt">New Password</li>
							<li class="inputfield"><input name="user_new_password" type="password" class="bar" required /></li>
						</ul>
						<ul class="forms">
							<li class="txt">Confirm Password</li>
							<li class="inputfield"><input name="user_confirm_password" type="password" class="bar" required /></li>
						</ul>
						<div class="clear"></div>
						<ul class="forms">
							<li class="txt">&nbsp;</li>
							<li class="textfield"><input type="submit" value="Change Password" class="simplebtn"></li>
							<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
						</ul>
						<input type="hidden" name="act" value="change_password">
					</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 