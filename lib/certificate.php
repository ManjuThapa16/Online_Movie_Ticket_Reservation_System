<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_certificate")
	{
		save_certificate();
		exit;
	}
	if($_REQUEST[act]=="delete_certificate")
	{
		delete_certificate();
		exit;
	}
	if($_REQUEST[act]=="update_certificate_status")
	{
		update_certificate_status();
		exit;
	}
	
	###Code for save certificate#####
	function save_certificate()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[certificate_id])
		{
			$statement = "UPDATE `certificate` SET";
			$cond = "WHERE `certificate_id` = '$R[certificate_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `certificate` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`certificate_name` = '$R[certificate_name]', 
				`certificate_description` = '$R[certificate_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../certificate-report.php?msg=$msg");
	}
#########Function for delete certificate##########3
function delete_certificate()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM certificate WHERE certificate_id = $_REQUEST[certificate_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../certificate-report.php?msg=Deleted Successfully.");
}
?>