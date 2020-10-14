<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_language")
	{
		save_language();
		exit;
	}
	if($_REQUEST[act]=="delete_language")
	{
		delete_language();
		exit;
	}
	if($_REQUEST[act]=="update_language_status")
	{
		update_language_status();
		exit;
	}
	
	###Code for save language#####
	function save_language()
	{
		global $con;
		$R=$_REQUEST;						
		if($R[language_id])
		{
			$statement = "UPDATE `language` SET";
			$cond = "WHERE `language_id` = '$R[language_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `language` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`language_name` = '$R[language_name]', 
				`language_description` = '$R[language_description]'". 
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		header("Location:../language-report.php?msg=$msg");
	}
#########Function for delete language##########3
function delete_language()
{	
	global $con;
	/////////Delete the record//////////
	$SQL="DELETE FROM language WHERE language_id = $_REQUEST[language_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	header("Location:../language-report.php?msg=Deleted Successfully.");
}
?>