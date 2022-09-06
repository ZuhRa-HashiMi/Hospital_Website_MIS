<?php require_once("connection.php"); ?>
<?php

    checkLevel(4, 9, 9, 4, 9, 9, 9, 9, 9, 9);

	$staff_id = getValue($_GET["staff_id"]);
	$staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_id = $staff_id");
	$row_staff = mysqli_fetch_assoc($staff);

	$department = mysqli_query($con, "SELECT * FROM department ORDER BY department_id ASC");
	$row_department = mysqli_fetch_assoc($department);
	
	if(isset($_POST["firstname"])) {
		
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$position = getValue($_POST["position"]);
		$gross_salary = getValue($_POST["gross_salary"]);
		$currency = getValue($_POST["currency"]);
		
		$email = getValue($_POST["email"]);
		if($email == "") {
			$email = " NULL ";
		}
		else {
			$email = "'" . $email . "'";
		}
		
		
		$address = getValue($_POST["address"]);
		
		$phone = getValue($_POST["phone"]);
		
		
		if($_FILES["photo"]["name"] != "") { 
		
			$filetype = $_FILES["photo"]["type"];
			
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {		
					$path = "images/staff/" . time() . $_FILES["photo"]["name"];		
					$result = move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
					
					if($row_staff["photo"] != "images/staff/user_m.png" && $row_staff["photo"] != "images/staff/user_f.png") {
						unlink($row_staff["photo"]);
					}
					
				}
				else {
					header("location:staff_edit.php?filesize=invalid&staff_id=$staff_id");
				}
			}
			else {
				header("location:staff_edit.php?filetype=invalid&staff_id=$staff_id");
			}		
		
		}
		else {
			$path = $row_staff["photo"];
		}
		
		$gender = getValue($_POST["gender"]);
		$dob = getValue($_POST["dob"]);
		$nic = getValue($_POST["nic"]);
	
		$hire_date = getValue($_POST["hire_date"]);
		$staff_type = getValue($_POST["staff_type"]);
		$department_id = getValue($_POST["department_id"]);
		
	    
		$result = mysqli_query($con, "UPDATE staff SET firstname='$firstname', lastname='$lastname',  position='$position', gross_salary=$gross_salary, currency='$currency',  email=$email, address='$address',  phone='$phone',  photo='$path',  gender=$gender, dob=$dob, nic='$nic', hire_date='$hire_date', staff_type=$staff_type, department_id=$department_id WHERE staff_id = $staff_id");
		
		
		
		
		if($result) {
			header("location:staff_list.php?edit=done");
		}
		else {
			header("location:staff_edit.php?error=notedit&staff_id=$staff_id");
		}
		
	}
	

?>
<?php require_once("header.php"); ?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Edit Staff</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["filetype"])) { ?>
			<div class="alert alert-warning">
				Invalid file type (Choose only jpg, png, gif)!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["filesize"])) { ?>
			<div class="alert alert-warning">
				Invalid file size (maximum allowed size is 4 MB)!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["upload"])) { ?>
			<div class="alert alert-danger">
				Could not upload staff photo! Please try again!
			</div>
		<?php } ?>
		
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Registration failed! Please try again!
			</div>
		<?php } ?>
	
		<form method="post" enctype="multipart/form-data">
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="input-group">
				<span class="input-group-addon">
					Firstname:
				</span>
				<input required value="<?php echo $row_staff["firstname"]; ?>" type="text" name="firstname" class="form-control">
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input required value="<?php echo $row_staff["lastname"]; ?>" type="text" name="lastname" class="form-control">
			</div>
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span>
				<input value="<?php echo $row_staff["position"]; ?>" required type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Salary:
				</span>
				<input value="<?php echo $row_staff["gross_salary"]; ?>" required type="text" name="gross_salary" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Currency:
				</span>
				<select name="currency" class="form-control">
					<option <?php if($row_staff["currency"] == "AFN") echo "selected"; ?>>AFN</option>
					<option <?php if($row_staff["currency"] == "USD") echo "selected"; ?>>USD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Email:
				</span>
				<input value="<?php echo $row_staff["email"]; ?>" type="email" name="email" class="form-control">
			</div>
		
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span>
				<input value="<?php echo $row_staff["address"]; ?>" required type="text" name="address" class="form-control">
			</div>
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Phone:
				</span>
				<input value="<?php echo $row_staff["phone"]; ?>" required type="text" name="phone" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input type="file" name="photo" class="form-control">
				<span class="input-group-addon" style="width:25px;padding:0 2px;">
					<img src="<?php echo $row_staff["photo"]; ?>" width="25">
				</span>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span>  &nbsp;
				<label><input <?php if($row_staff["gender"] == 0) echo "checked"; ?> type="radio" name="gender" value="0"> Male</label> &nbsp;
				<label><input <?php if($row_staff["gender"] == 1) echo "checked"; ?> type="radio" name="gender" value="1"> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<select name="dob" class="form-control">
					<?php
						$year = date("Y");
						$max = $year - 18;
						$min = $year - 65;
						
						for($x=$max; $x>$min; $x--) {
						?>
							<option <?php if($row_staff["dob"] == $x) { echo "selected"; } ?>><?php echo $x; ?></option>	
						<?php } ?>
					
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input value="<?php echo $row_staff["nic"]; ?>" required type="text" name="nic" class="form-control">
			</div>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Hire Date:
				</span>
				<input value="<?php echo $row_staff["hire_date"]; ?>" value="<?php echo date("Y-m-d"); ?>" required autocomplete="off" type="text" id="hire_date" name="hire_date" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Staff Type:
				</span>
				<select name="staff_type" class="form-control">
					<option value="1" <?php if($row_staff["staff_type"] == 1) echo "selected"; ?>>Doctor</option>
					<option value="2" <?php if($row_staff["staff_type"] == 2) echo "selected"; ?>>Nurse</option>
					<option value="3" <?php if($row_staff["staff_type"] == 3) echo "selected"; ?>>Employee</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Department:
				</span>
				<select name="department_id" class="form-control">
					
					<option value="NULL">None</option>
						
					<?php do { ?>
						<option <?php if($row_staff["department_id"] == $row_department["department_id"]) echo "selected"; ?> value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["department_name"]; ?></option>
					<?php } while($row_department = mysqli_fetch_assoc($department)); ?>
				</select>
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-primary">
			
			</div>
			
		</form>
	</div>
</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "hire_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

<?php require_once("footer_mis.php"); ?>