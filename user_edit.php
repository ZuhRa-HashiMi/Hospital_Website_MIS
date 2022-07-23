<?php require_once("connection.php"); ?>
<?php
    $user_id=getValue($_GET["user_id"]);
	$user = mysqli_query($con, "SELECT * FROM users WHERE user_id = $user_id");
	
	$row_user=mysqli_fetch_assoc($user);







	
	if(isset($_POST["username"])) {
		$username = getValue($_POST["username"]);
		$user_type = getValue($_POST["user_type"]);
		$admin_level = getValue($_POST["admin_level"]);
		$website_level = getValue($_POST["website_level"]);
		$stock_level = getValue($_POST["stock_level"]);
		$hr_level = getValue($_POST["hr_level"]);
		$finance_level = getValue($_POST["finance_level"]);
		$surgery_level = getValue($_POST["surgery_level"]);
		$pharmacy_level = getValue($_POST["pharmacy_level"]);
		$labrotoar_level = getValue($_POST["labrotoar_level"]);
		$blood_bank_level = getValue($_POST["blood_bank_level"]);
		$patient_level = getValue($_POST["patient_level"]);
		
		$result = mysqli_query($con, "UPDATE users SET username='$username', user_type=$user_type, admin_level= $admin_level, website_level= $website_level, stock_level= $stock_level, hr_level= $hr_level, finance_level= $finance_level, surgery_level= $surgery_level, pharmacy_level= $pharmacy_level, labrotoar_level= $labrotoar_level, blood_bank_level= $blood_bank_level, patient_level=$patient_level WHERE user_id=$user_id" );
		
		if($result) {
			header("location:user_list.php?edit=done");
		}
		else {
			header("location:user_edit.php?error=notedit&user_id=$user_id");
		}
		
	}
	
?>
<?php require_once("header.php"); ?>

<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">

<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h1>Edit User</h1>
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
					Username:
				</span>
				<input value="<?php echo $row_user["username"]; ?>"type="text" class="form-control" name="username">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					User Type:
				</span>
				<select name="user_type" class="form-control">
					<option value="1" <?php if ($row_user["user_type"]==1) echo "selected"; ?> >Admin</option>
					<option value="0" <?php if ($row_user["user_type"]==0) echo "selected"; ?> >Staff</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Admin Level:
				</span>
				<select name="admin_level" class="form-control">
					<option value="0" <?php if ($row_user["admin_level"]==0) echo "selected"; ?>>None</option>
					<option value="1" <?php if ($row_user["admin_level"]==1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if ($row_user["admin_level"]==2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if ($row_user["admin_level"]==4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if ($row_user["admin_level"]==8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Website Level:
				</span>
				<select name="website_level" class="form-control">
					<option value="0" <?php if ($row_user["website_level"]==0) echo "selected"; ?>>None</option>
					<option value="1" <?php if ($row_user["website_level"]==1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if ($row_user["website_level"]==2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if ($row_user["website_level"]==4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if ($row_user["website_level"]==8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Stock Level:
				</span>
				<select name="stock_level" class="form-control">
					<option value="0" <?php if ($row_user["stock_level"]==0) echo "selected"; ?>>None</option>
					<option value="1" <?php if ($row_user["stock_level"]==1) echo "selected"; ?> >Read</option>
					<option value="2" <?php if ($row_user["stock_level"]==2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if ($row_user["stock_level"]==4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if ($row_user["stock_level"]==8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					HR Level:
				</span>
				<select name="hr_level" class="form-control">
					<option value="0" <?php if($row_user["hr_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["hr_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["hr_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["hr_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["hr_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Finance Level:
				</span>
				<select name="finance_level" class="form-control">
				<option value="0" <?php if($row_user["finance_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["finance_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["finance_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["finance_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["finance_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Surgery Level:
				</span>
				<select name="surgery_level" class="form-control">
			<option value="0" <?php if($row_user["surgery_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["surgery_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["surgery_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["surgery_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["surgery_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Pharmacy Level:
				</span>
				<select name="pharmacy_level" class="form-control">
					<option value="0" <?php if($row_user["pharmacy_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["pharmacy_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["pharmacy_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["pharmacy_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["pharmacy_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Laboratoar Level:
				</span>
				<select name="labrotoar_level" class="form-control">
					<option value="0" <?php if($row_user["labrotoar_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["labrotoar_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["labrotoar_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["labrotoar_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["labrotoar_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Blood Bank Level:
				</span>
				<select name="blood_bank_level" class="form-control">
					<option value="0" <?php if($row_user["blood_bank_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["blood_bank_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["blood_bank_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["blood_bank_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["blood_bank_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Patient Level:
				</span>
				<select name="patient_level" class="form-control">
					<option value="0" <?php if($row_user["patient_level"] == 0) echo "selected"; ?>>None</option>
					<option value="1" <?php if($row_user["patient_level"] == 1) echo "selected"; ?>>Read</option>
					<option value="2" <?php if($row_user["patient_level"] == 2) echo "selected"; ?>>Insert</option>
					<option value="4" <?php if($row_user["patient_level"] == 4) echo "selected"; ?>>Edit</option>
					<option value="8" <?php if($row_user["patient_level"] == 8) echo "selected"; ?>>Remove</option>
				</select>
			</div>
			
			<input type="submit" class="btn btn-primary" value="Save Changes">
			
		</form>
		
	</div>

</div>

</div>

<?php require_once("footer_mis.php"); ?>


