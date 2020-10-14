<?php
	session_start();
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_movie")
	{
		save_movie();
		exit;
	}
	if($_REQUEST[act]=="delete_movie")
	{
		delete_movie();
		exit;
	}
	###Code for save movie#####
	function save_movie()
	{
		global $con;
		$R=$_REQUEST;
		/////////////////////////////////////
		$image_name = $_FILES[movie_image][name];
		$location = $_FILES[movie_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		if($R[movie_id])
		{
			$statement = "UPDATE `movie` SET";
			$cond = "WHERE `movie_id` = '$R[movie_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `movie` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`movie_certificate_id` = '$R[movie_certificate_id]', 
				`movie_name` = '$R[movie_name]', 
				`movie_image` = '$image_name', 
				`movie_trailer_url` = '$R[movie_trailer_url]', 
				`movie_language_id` = '$R[movie_language_id]', 
				`movie_type_id` = '$R[movie_type_id]', 
				`movie_duration` = '$R[movie_duration]', 
				`movie_release_date` = '$R[movie_release_date]', 
				`movie_end_date` = '$R[movie_end_date]', 
				`movie_director` = '$R[movie_director]', 
				`movie_cast` = '$R[movie_cast]', 
				`movie_description` = '$R[movie_description]'".
				 $cond;
		$rs = mysqli_query($con,$SQL) or die(mysqli_error($con));
		
		header("Location:../movie-report.php?msg=$msg&type=$R[movie_level_id]");
	}
#########Function for delete movie##########3
function delete_movie()
{
	global $con;
	$SQL="SELECT * FROM movie WHERE movie_id = $_REQUEST[movie_id]";
	$rs=mysqli_query($con,$SQL);
	$data=mysqli_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM movie WHERE movie_id = $_REQUEST[movie_id]";
	mysqli_query($con,$SQL) or die(mysqli_error($con));
	
	//////////Delete the image///////////
	if($data[movie_image])
	{
		unlink("../uploads/".$data[movie_image]);
	}
	header("Location:../movie-report.php?msg=Deleted Successfully.&type=$data[movie_level_id]");
}
?>