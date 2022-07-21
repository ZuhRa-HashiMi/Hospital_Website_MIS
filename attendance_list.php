<?php require_once("connection.php"); ?>
<?php

	if(isset($_GET["year"])) {
		$year = getValue($_GET["year"]);
		$month = getValue($_GET["month"]);
	}
	else { 
		$year = date("Y");
		$month = date("m");
	}

	$attendance = mysqli_query($con, "SELECT *, (SELECT SUM(hours) FROM attendances WHERE staff_id = staff.staff_id AND absent_month = $month AND absent_year = $year) AS totalhours FROM staff");
	$row_attendance = mysqli_fetch_assoc($attendance);

?>
<?php require_once("header.php"); ?>

<a style="margin-left:10px;" href="#" id="print" class="noprint btn btn-primary pull-right">
	<span class="glyphicon glyphicon-print"></span> 
	Print
</a>

<a href="attendance_add.php" class="noprint btn btn-primary pull-right">
	<span class="glyphicon glyphicon-plus"></span>
	Add Absent
</a>



<h2>Attendance Report (<?php echo $year; ?>/<?php echo $month; ?>)</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New attendance has been successfully added!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected attendance has been successfully updated!
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected attendance has been successfully deleted!
	</div>
<?php } ?>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Could not delete selected attendance!
	</div>
<?php } ?>

<form method="get" class="noprint">
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
	<div class="input-group">
		<span class="input-group-addon">
			Month: 
		</span>
		<select class="form-control" name="month">
			<option value="1">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">Auguest</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
	</div>
	
	</div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		
		<div class="input-group">
			<span class="input-group-addon">
				Year:
			</span>
			<input value="<?php echo date("Y"); ?>" type="text" name="year" class="form-control">
			<span class="input-group-btn">
				<input type="submit" value="Show" class="btn btn-primary">
			</span>
		</div>
		
		
		
		
	
	</div>
	
</form>

<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Staff Name</th>
		<th>Photo</th>
		<th>Position</th>
		<th>Hours</th>
		<th class="noprint">Detail</th>
	</tr>

	<?php do { ?>
	<tr>
		<td><?php echo $row_attendance["staff_id"]; ?></td>
		<td><?php echo $row_attendance["firstname"]; ?> <?php echo $row_attendance["lastname"]; ?></td>
		<td><img src="<?php echo $row_attendance["photo"]; ?>" width="40" class=""></td>
		<td><?php echo $row_attendance["position"]; ?></td>
		<td><?php
				echo $row_attendance["totalhours"] != "" ? $row_attendance["totalhours"] : "0";
			?> hrs </td>
			
		<td class="noprint">
			<a href="attendance_detail.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $year; ?>&absent_month=<?php echo $month; ?>">
				<span class="glyphicon glyphicon-info-sign"></span>
			</a>
		</td>
		
	</tr>
	<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
	
</table>


<?php require_once("footer_mis.php"); ?>