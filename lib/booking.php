<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_booking")
	{
		save_booking();
		exit;
	}
	if($_REQUEST[act]=="delete_booking")
	{
		delete_booking();
		exit;
	}
	if($_REQUEST[act]=="update_booking_status")
	{
		update_booking_status();
		exit;
	}
	
	###Code for save booking#####
	function save_booking()
	{
		$R=$_REQUEST;			
		global $movie_price;				
		global $con;
		$totalCost = $movie_price * $R['booking_no_seats'];			
		if($R[booking_id])
		{
			$statement = "UPDATE `booking` SET";
			$cond = "WHERE `booking_id` = '$R[booking_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `booking` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`booking_user_id` = '".$_SESSION['user_details']['user_id']."', 
				`booking_movie_id` = '$R[booking_movie_id]', 
				`booking_show_id` = '$R[booking_show_id]', 
				`booking_date` = '$R[booking_date]', 
				`booking_no_seats` = '$R[booking_no_seats]', 
				`booking_amount` = '$totalCost'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		$insertID = mysqli_insert_id($con);
		header("Location:../payment.php?booking_no_seats=$R[booking_no_seats]&booking_id=$insertID");
	}
#########Function for delete booking##########3
function delete_booking()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM booking WHERE booking_id = $_REQUEST[booking_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../booking-report.php?msg=Deleted Successfully.");
}
?>
