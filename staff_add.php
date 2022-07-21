
<?php require_once("connection.php"); ?>
<?php


	$department = mysqli_query($con, "SELECT * FROM department ORDER BY department_id ASC");
	$row_department = mysqli_fetch_assoc($department);
	
	if(isset($_POST["firstname"])) {
		$firstname = getValue($_POST["firstname"]);
		$lastname = getValue($_POST["lastname"]);
		$gender = getValue($_POST["gender"]);
		$dob = getValue($_POST["dob"]);
		$nic = getValue($_POST["nic"]);
		$position = getValue($_POST["position"]);
		$gross_salary = getValue($_POST["gross_salary"]);
		$currency = getValue($_POST["currency"]);
		$phone = getValue($_POST["phone"]);
		
		$email = getValue($_POST["email"]);
		if($email == "") {
			$email = " NULL ";
		}
		else {
			$email = "'" . $email . "'";
		}
		
		$address = getValue($_POST["address"]);
		$hire_date = getValue($_POST["hire_date"]);
		$staff_type = getValue($_POST["staff_type"]);
		$department_id = getValue($_POST["department_id"]);
		
		
		if($_FILES["photo"]["name"] != "") { 
		
			$filetype = $_FILES["photo"]["type"];
			
			if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
				if($_FILES["photo"]["size"] <= 4 * 1024 * 1024) {		
					$path = "images/staff/" . time() . $_FILES["photo"]["name"];		
					$result = move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
					if(!$result) {
						header("location:staff_add.php?upload=failed");
					}
				}
				else {
					header("location:staff_add.php?filesize=invalid");
				}
			}
			else {
				header("location:staff_add.php?filetype=invalid");
			}		
		}
		else {
			if($gender == 0) {
				$path = "images/staff/user_m.png";
			}
			else {
				$path = "images/staff/user_f.png";
			}
		}
		
		
		$result = mysqli_query($con, "INSERT INTO staff VALUES (NULL, '$firstname', '$lastname', $gender, $dob, '$nic', '$path', '$position', $gross_salary, '$currency', '$phone', $email, '$address', '$hire_date', $staff_type, $department_id)");
		if($result) {
			header("location:staff_list.php?add=done");
		}
		else {
			header("location:staff_add.php?error=notadd");
		}
		
		
	}

?>


<?php require_once("header.php"); ?>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Add New Staff</h1>
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
				<input required type="text" name="firstname" class="form-control">
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input required type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span>  &nbsp;
				<label><input checked type="radio" name="gender" value="0"> Male</label> &nbsp;
				<label><input type="radio" name="gender" value="1"> Female</label>
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
							<option><?php echo $x; ?></option>	
						<?php } ?>
					
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					NIC:
				</span>
				<input required type="text" name="nic" class="form-control">
			</div>
			
			
			
			<div class="input-group">
				<span class="input-group-addon">
					Position:
				</span>
				<input required type="text" name="position" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Salary:
				</span>
				<input required type="text" name="gross_salary" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Currency:
				</span>
				<select name="currency" class="form-control">
					<option>AFN</option>
					<option>USD</option>
				</select>
			</div>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="input-group">
				<span class="input-group-addon">
					Photo:
				</span>
				<input type="file" name="photo" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Phone:
				</span>
				<input required type="text" name="phone" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Email:
				</span>
				<input type="email" name="email" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Address:
				</span>
				<input required type="text" name="address" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Hire Date:
				</span>
				<input value="<?php echo date("Y-m-d"); ?>" required autocomplete="off" type="text" id="hire_date" name="hire_date" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Staff Type:
				</span>
				<select name="staff_type" class="form-control">
					<option value="1">Doctor</option>
					<option value="2">Nurse</option>
					<option value="3">Employee</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Department:
				</span>
				<select name="department_id" class="form-control">
					
					<option value="NULL">None</option>
						
					<?php do { ?>
						<option value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["department_name"]; ?></option>
					<?php } while($row_department = mysqli_fetch_assoc($department)); ?>
				</select>
			</div>
			
			<input type="submit" value="Register Staff" class="btn btn-primary">
			
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