<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_type")
	{
		save_type();
		exit;
	}
	if($_REQUEST[act]=="delete_type")
	{
		delete_type();
		exit;
	}
	if($_REQUEST[act]=="update_type_status")
	{
		update_type_status();
		exit;
	}
	
	###Code for save type#####
	function save_type()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[type_id])
		{
			$statement = "UPDATE `type` SET";
			$cond = "WHERE `type_id` = '$R[type_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `type` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`type_name` = '$R[type_name]', 
				`type_description` = '$R[type_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../type-report.php?msg=$msg");
	}
#########Function for delete type##########3
function delete_type()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM type WHERE type_id = $_REQUEST[type_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../type-report.php?msg=Deleted Successfully.");
}
?>