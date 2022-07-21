<?php require_once("connection.php"); ?>
<?php 
  $staff = mysqli_query($con, "SELECT * FROM staff LEFT JOIN department ON department.department_id=staff.department_id");
	$row_staff = mysqli_fetch_assoc($staff);
	
	
	
	
	
	
?>


<?php require_once("header.php"); ?>


<h2>Staff List</h2>
<table class="table table-striped">
  <tr>
     <th>ID</th>
	 <th>Staff Name</th>
	  <th>Photo</th>
	   <th>Position</th>
	    <th>Salary</th>
			<th>Staff Type</th>
		 <th>Department</th>
		 <th class="noprint">Edit</th>
		<th class="noprint">Delete</th>
  </tr>
  <?php do{?>
  <tr>
       <td><?php echo $row_staff["staff_id"];?></td>
       <td><?php echo $row_staff["firstname"];?> <?php echo $row_staff["lastname"];?></td>
	   <td><img src="<?php echo $row_staff["photo"];?>" width="40" class="img-circle"> </td>
	   <td><?php echo $row_staff["position"];?></td>
	   <td><?php echo $row_staff["gross_salary"];?></td>
	   <td><?php
			
			if($row_staff["staff_type"] == 1) {
				echo "Doctor";
			}
			else if($row_staff["staff_type"] == 2) {
				echo "Nurse";
			}
			else {
				echo "Employee";
			}
		
		?></td>
	   <td><?php echo $row_staff["department_name"]; ?></td>
		<td class="noprint">
			<a href="staff_edit.php?staff_id=<?php echo $row_staff["staff_id"]; ?>">
				<span class="glyphicon glyphicon-edit"></span>
			</a>
		</td>
		<td class="noprint">
			<a class="delete" href="staff_delete.php?staff_id=<?php echo $row_staff["staff_id"]; ?>">
				<span class="glyphicon glyphicon-trash"></span>
			</a>
		</td>
	
	    
  
  </tr>
  
  <?php } while($row_staff = mysqli_fetch_assoc($staff));?>
	
</table>


<?php require_once("footer_mis.php");?>
