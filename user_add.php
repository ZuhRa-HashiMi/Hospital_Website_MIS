<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["username"])) {
		$username = getValue($_POST["username"]);
		$password = getValue($_POST["password"]);
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
		
		$result = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$username', PASSWORD('$password'), $user_type, $admin_level, $website_level, $stock_level, $hr_level, $finance_level, $surgery_level, $pharmacy_level, $labrotoar_level, $blood_bank_level, $patient_level)");
		
		if($result) {
			header("location:user_list.php?add=done");
		}
		else {
			header("location:user_add.php?error=notadd");
		}
		
	}
	
?>
<?php require_once("header.php"); ?>

<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">

<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h1>Add New User</h1>
	</div>

	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new user!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					Username:
				</span>
				<input type="text" class="form-control" name="username">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Password:
				</span>
				<input type="password" class="form-control" name="password">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					User Type:
				</span>
				<select name="user_type" class="form-control">
					<option value="1">Admin</option>
					<option value="0">Staff</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Admin Level:
				</span>
				<select name="admin_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Website Level:
				</span>
				<select name="website_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Stock Level:
				</span>
				<select name="stock_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					HR Level:
				</span>
				<select name="hr_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Finance Level:
				</span>
				<select name="finance_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Surgery Level:
				</span>
				<select name="surgery_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Pharmacy Level:
				</span>
				<select name="pharmacy_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Laboratoar Level:
				</span>
				<select name="labrotoar_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Blood Bank Level:
				</span>
				<select name="blood_bank_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Patient Level:
				</span>
				<select name="patient_level" class="form-control">
					<option value="0">None</option>
					<option value="1">Read</option>
					<option value="2">Insert</option>
					<option value="4">Edit</option>
					<option value="8">Remove</option>
				</select>
			</div>
			
			<input type="submit" class="btn btn-primary" value="Add User">
			
		</form>
		
	</div>

</div>

</div>

<?php require_once("footer_mis.php"); ?>


