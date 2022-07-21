<?php require_once("connection.php"); ?>
<?php 
  $staff = mysqli_query($con, "SELECT * FROM staff");
	$row_staff = mysqli_fetch_assoc($staff);
	
	
	
	
	
	
?>


<?php require_once("header.php"); ?>


<h2>Staff List</h2>
<table>
  <tr>
     <th>ID</th>
	 <th>Staff Name</th>
	  <th>Photo</th>
	   <th>Position</th>
	    <th>Salary</th>
		 <th>Department</th>
  </tr>
  <?php do{?>
  <tr>
       <td><?php echo $row_staff["staff_id"];?></td>
       <td><?php echo $row_staff["firstname"];?> <?php echo $row_staff["lastname"];?></td>
	   <td><?php echo $row_staff["photo"];?></td>
	   <td><?php echo $row_staff["position"];?></td>
	   <td><?php echo $row_staff["gross_salary"];?></td>
	   <td><?php echo $row_staff["department_id"];?></td>
	    
  
  </tr>
  
  <?php } while($row_staff = mysqli_fetch_assoc($staff));?>
	
</table>


<?php require_once("footer_mis.php");?>
