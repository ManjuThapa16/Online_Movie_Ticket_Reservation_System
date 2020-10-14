<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `certificate`";
	$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?>
<script>
function delete_certificate(certificate_id)
{
	if(confirm("Do you want to delete the certificate?"))
	{
		this.document.frm_certificate.certificate_id.value=certificate_id;
		this.document.frm_certificate.act.value="delete_certificate";
		this.document.frm_certificate.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Movie Certificate Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_certificate" action="lib/certificate.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Description</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysqli_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[certificate_id]?></td>
						<td><?=$data[certificate_name]?></td>
						<td><?=$data[certificate_description]?></td>
						<td style="text-align:center">
							<a href="certificate.php?certificate_id=<?php echo $data[certificate_id] ?>">Edit</a> | <a href="Javascript:delete_certificate(<?=$data[certificate_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="certificate_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 