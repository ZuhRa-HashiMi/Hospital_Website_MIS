<?php require_once("connection.php"); ?>
<?php 
      
	  
	checkLevel(1, 9, 9, 1, 1, 9, 9, 9, 9, 9);




  
	if(isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	else {
		$page = 1;
	}

	$allstaff = mysqli_query($con, "SELECT * FROM staff LEFT JOIN department ON department.department_id = staff.department_id");
	$row_allstaff = mysqli_fetch_assoc($allstaff);
	
	$totalrows = mysqli_num_rows($allstaff);
	$rows_per_page = 2;
	$totalpage = ceil($totalrows / $rows_per_page);

	$offset = ($page - 1) * $rows_per_page;
	
	$staff = mysqli_query($con, "SELECT * FROM staff LEFT JOIN department ON department.department_id = staff.department_id LIMIT $offset, $rows_per_page");
	$row_staff = mysqli_fetch_assoc($staff);
	
	
	
	
	
?>


<?php require_once("header.php"); ?>

<a href="#" id="print" class="noprint btn btn-primary pull-right">
	<span class="glyphicon glyphicon-print"></span> 
	Print
</a>


<h2>Staff List</h2>
<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New staff has been successfully added!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected staff has been successfully updated!
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected staff has been successfully deleted!
	</div>
<?php } ?>

<?php if(isset($_GET["error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Could not delete selected staff!
	</div>
<?php } ?>
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


<ul class="pagination noprint">
<?php if($page != 1) { ?>
	<li><a href="staff_list.php?page=1">
		First 
	</a></li>
<?php } ?>

<?php if($page > 1) { ?>
	<li><a href="staff_list.php?page=<?php echo $page-1; ?>">
		Previous 
	</a></li>
<?php } ?>

<?php if($page < $totalpage) { ?>
	<li><a href="staff_list.php?page=<?php echo $page+1; ?>">
		Next
	</a></li>
<?php } ?>

<?php if($page != $totalpage) { ?>
	<li><a href="staff_list.php?page=<?php echo $totalpage; ?>">
		Last
	</a></li>
<?php } ?>
</ul>

<br>

<ul class="pagination noprint">
<?php for($x=1; $x<=$totalpage; $x++) { ?>
	<li>
		<?php if($x != $page) { ?>
			<a href="staff_list.php?page=<?php echo $x; ?>">
				<?php echo $x; ?>
			</a>
		<?php } else { ?>
			<a href="#">
				<?php echo $x; ?>
			</a>
		<?php } ?>
	</li>
<?php } ?>
</ul>



<?php require_once("footer_mis.php");?>
