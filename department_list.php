<?php require_once("connection.php"); ?>
<?php 

    
	$condition = "";

	if(isset($_GET["q"])) {
		$search = getValue($_GET["q"]);
		$condition = " WHERE department_name LIKE '%$search%' ";
	}
	
	$department = mysqli_query($con, "SELECT * FROM department $condition ORDER BY department_id ASC");
	$row_department = mysqli_fetch_assoc($department);
	
	$totalRows_department = mysqli_num_rows($department);
	
	
	
?>

<?php require_once("header.php");?>

<h2>Department List</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New department has been successfully added!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected department has been successfully Updated!
		
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected department has been successfully Deleted!
		
	</div>
<?php } ?>

<?php if(isset($_GET["Error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Could not delete selected department!
		
	</div>
<?php } ?>


<form method="get">
	<div class="input-group">
		<span class="input-group-addon">
			Search:
		</span>
		<input type="text" name="q" class="form-control">
		<span class="input-group-btn">
			<button class="btn btn-primary">
				<span style="color:white;" class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
</form>





<?php if(isset($_GET["q"])) { ?>
<div style="font-size:18px;">
	<b>Search for: <?php echo $_GET["q"]; ?></b>
	<br>
	<b>Total Result: <?php echo $totalRows_department; ?></b>
</div>
<?php } ?>


<?php if($totalRows_department > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<?php do { ?>
		<tr>
			<td><?php echo $row_department["department_id"]; ?></td>
			<td><?php echo $row_department["department_name"]; ?></td>
			<td>
				<a href="department_edit.php?department_id=<?php echo $row_department["department_id"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
				</a>
			</td>
			<td>
				<a class="delete" href="department_delete.php?department_id=<?php echo $row_department["department_id"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
		</tr>
	<?php } while($row_department = mysqli_fetch_assoc($department)); ?>
	
</table>
<?php } else { ?>
	<div class="alert alert-warning text-center">
		<h3 style="border:none;">No Result Found!</h3>
	</div>
<?php } ?>


<?php require_once("footer_mis.php"); ?>