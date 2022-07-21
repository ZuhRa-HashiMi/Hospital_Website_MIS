<?php require_once("connection.php"); ?>
<?php 
  $attendance = mysqli_query($con, "SELECT * FROM attendances");
	$row_attendance = mysqli_fetch_assoc($attendance);
	
	
	
	
	
	
?>


<?php require_once("header.php"); ?>


<h2>Attendace Report</h2>
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
     <th>ID</th>
	 <th>attendance Name</th>
	  <th>Photo</th>
	   <th>Position</th>
	    <th>Salary</th>
			<th>attendance Type</th>
		 <th>Department</th>
		 <th class="noprint">Edit</th>
		<th class="noprint">Delete</th>
  </tr>
  <?php do{?>
  <tr>
       <td><?php echo $row_attendance["attendance_id"];?></td>
       <td><?php echo $row_attendance["firstname"];?> <?php echo $row_attendance["lastname"];?></td>
	   <td><img src="<?php echo $row_attendance["photo"];?>" width="40" class="img-circle"> </td>
	   <td><?php echo $row_attendance["position"];?></td>
	   <td><?php echo $row_attendance["gross_salary"];?></td>
	   <td><?php
			
			if($row_attendance["attendance_type"] == 1) {
				echo "Doctor";
			}
			else if($row_attendance["attendance_type"] == 2) {
				echo "Nurse";
			}
			else {
				echo "Employee";
			}
		
		?></td>
	   <td><?php echo $row_attendance["department_name"]; ?></td>
		<td class="noprint">
			<a href="attendance_edit.php?attendance_id=<?php echo $row_attendance["attendance_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td class="noprint">
			<a class="delete" href="attendance_delete.php?attendance_id=<?php echo $row_attendance["attendance_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	
	    
  
  </tr>
  
  <?php } while($row_attendance = mysqli_fetch_assoc($attendance));?>
	
</table>


<?php require_once("footer_mis.php");?>
