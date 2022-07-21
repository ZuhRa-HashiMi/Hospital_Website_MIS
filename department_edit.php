<?php require_once("connection.php"); ?>
<?php

	$department_id = getValue($_GET["department_id"]);
	
	$department = mysqli_query($con, "SELECT * FROM department WHERE department_id = $department_id");
	$row_department = mysqli_fetch_assoc($department);

	
	if(isset($_POST["department_name"])) {
		$department_name = getValue($_POST["department_name"]);
		
		$result = mysqli_query($con, "UPDATE department SET department_name='$department_name' WHERE department_id = $department_id");
		
		if($result) {
			header("location:department_list.php?edit=done");
		}
		else {
			header("location:department_edit.php?error=notedit&department_id=$department_id");
		}
		
	}
	
?>
<?php require_once("header.php"); ?>

<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">

<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h1>Edit Department</h1>
	</div>

	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save changes!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					Department Name:
				</span>
				<input type="text" value="<?php echo $row_department["department_name"]; ?>" class="form-control" name="department_name">
			</div>
			
			<input type="submit" class="btn btn-primary" value="Save Changes">
			
		</form>
		
	</div>

</div>

</div>

<?php require_once("footer_mis.php"); ?>

