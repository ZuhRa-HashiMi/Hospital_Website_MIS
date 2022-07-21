<?php require_once("connection.php"); ?>
<?php

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
		
		$result = mysqli_query($con, "INSERT INTO attendances VALUES ($staff_id, $year, $month, $day, $hours)");
		
		if($result) {
			header("location:attendance_list.php?add=done");
		}
		else {
			header("location:attendance_add.php?error=notadd");
		}
		
	}

?>
<?php require_once("header.php"); ?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Add New Absent</h1>
	</div>
	
	<div class="panel-body">
	
		<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save attendance! Please try again!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					Staff Name:
				</span>
				<select name="staff_id" class="form-control">
					<?php do { ?>
						<option value="<?php echo $row_staff["staff_id"]; ?>"><?php echo $row_staff["firstname"]; ?> <?php echo $row_staff["lastname"]; ?></option>
					<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
				</select>
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					Absent Date:
				</span>
				<input id="absent_date" value="<?php echo date("Y-m-d"); ?>" required type="text" name="absent_date" class="form-control">
			</div> 
			
			<div class="input-group">
				<span class="input-group-addon">
					Hours:
				</span>
				<input required type="text" name="hours" class="form-control">
			</div>
			
			<input type="submit" value="Add Absent" class="btn btn-primary">
			
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