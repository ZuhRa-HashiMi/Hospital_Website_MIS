<?php require_once("connection.php"); ?>
<?php

	$year = getValue($_GET["absent_year"]);
	$month = getValue($_GET["absent_month"]);
	$staff_id = getValue($_GET["staff_id"]);

	$attendance = mysqli_query($con, "SELECT * FROM attendances WHERE staff_id = $staff_id AND absent_year = $year AND absent_month = $month");
	$row_attendance = mysqli_fetch_assoc($attendance);

?>
<?php require_once("header.php"); ?>

<h2>Attendance Detail</h2>

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



<table class="table table-striped">
	<tr>
		<th>Date</th>
		<th>Hours</th>
		<th width="30">Edit</th>
		<th width="30">Delete</th>
	</tr>

	<?php $total = 0; do { ?>
	<tr>
		<td><?php echo $row_attendance["absent_year"]; ?>-<?php echo $row_attendance["absent_month"]; ?>-<?php echo $row_attendance["absent_day"]; ?></td>
		<td data-toggle="modal" data-target="#myModal">
			<?php echo $row_attendance["hours"]; ?> hrs 
		</td>
		<?php $total += $row_attendance["hours"]; ?>
		<td align="center">
			<a href="attendance_edit.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td align="center">
			<a class="delete" href="attendance_delete.php?staff_id=<?php echo $row_attendance["staff_id"]; ?>&absent_year=<?php echo $row_attendance["absent_year"]; ?>&absent_month=<?php echo $row_attendance["absent_month"]; ?>&absent_day=<?php echo $row_attendance["absent_day"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	</tr>
	<?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>
	
	<tr>
		<td><b>Total</b></td>
		<td><b><?php echo $total; ?> hrs</b></td>
		<td></td>
		<td></td>
	</tr>
	
</table>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Attendance</h4>
      </div>
      <div class="modal-body">

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
				<script type="text/javascript">
					Calendar.setup({
						inputField      :    "absent_date",
						ifFormat        :    "%Y-%m-%d",
						showsTime       :    false,
						timeFormat      :    "24"
					});
				</script>
	   
              </div>

              </div>
             </div>


<?php require_once("footer_mis.php"); ?>