<?php require_once("connection.php"); ?>
<?php

	$staff_id = getValue($_GET["staff_id"]);
	$absent_year = getValue($_GET["absent_year"]);
	$absent_month = getValue($_GET["absent_month"]);
	$absent_day = getValue($_GET["absent_day"]);

	$attendance = mysqli_query($con, "SELECT * FROM attendance WHERE staff_id = $staff_id AND absent_year = $absent_year AND absent_month = $absent_month AND absent_day = $absent_day");
	$row_attendance = mysqli_fetch_assoc($attendance);

	$staff = mysqli_query($con, "SELECT * FROM staff");
	$row_staff = mysqli_fetch_assoc($staff);
	
	if(isset($_POST["absent_date"])) {
		
		$staff_id = getValue($_POST["staff_id"]);
		$absent_date = getValue($_POST["absent_date"]);
		$hours = getValue($_POST["hours"]);
		
		$parts = explode("-", $absent_date);
		$year = $parts[0];
		$month = $parts[1];
		$day = $parts[2];
		
		$result = mysqli_query($con, "UPDATE attendances SET staff_id=$staff_id, absent_year=$year, absent_month=$month, absent_day=$day, hours=$hours WHERE staff_id = $staff_id AND absent_year = $absent_year AND absent_month = $absent_month AND absent_day = $absent_day");
		
		if($result) {
			header("location:attendance_detail.php?edit=done&staff_id=$staff_id&absent_year=$absent_year&absent_month=$absent_month");
		}
		else {
			header("location:attendance_edit.php?error=notedit&&staff_id=$staff_id&absent_year=$absent_year&absent_month=$absent_month&absent_day=$absent_day");
		}
		
	}

?>
<?php require_once("header.php"); ?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Edit Attendance</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save changes! Please try again!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					Staff Name:
				</span>
				<select name="staff_id" class="form-control">
					<?php do { ?>
						<option <?php if($row_staff["staff_id"] == $row_attendance["staff_id"]) echo "selected"; ?> value="<?php echo $row_staff["staff_id"]; ?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?></option>
					<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
				</select>
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					Absent Date:
				</span>
				<input id="absent_date" value="<?php echo $row_attendance["absent_year"] ?>-<?php echo $row_attendance["absent_month"] ?>-<?php echo $row_attendance["absent_day"] ?>" required type="text" name="absent_date" class="form-control">
			</div> 
			
			<div class="input-group">
				<span class="input-group-addon">
					Hours:
				</span>
				<input value="<?php echo $row_attendance["hours"]; ?>" required type="text" name="hours" class="form-control">
			</div>
			
			<input type="submit" value="Save Changes" class="btn btn-primary">
			
			</div>
			
		</form>
	</div>
</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "absent_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

<?php require_once("footer_mis.php"); ?>