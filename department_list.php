<?php require_once("connection.php"); ?>
<?php 

     
	$department = mysqli_query($con, "SELECT * FROM department");
	$row_department = mysqli_fetch_assoc($department);
	
	
?>

<?php require_once("header.php");?>

<h2>Department List</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New department has been successfully added!
	</div>
<?php } ?>
<table class="table table-striped">
<tr>
    <th>ID</th>
	<th>Name</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php do {?>
<tr>
    <td><?php echo $row_department ["department_id"] ?></td>
	<td><?php echo $row_department ["department_name"] ?></td>
	<td><span class="glyphicon glyphicon-edit"></span></td>
</tr>
<?php } while($row_department = mysqli_fetch_assoc($department));?>

</table>



<?php require_once("footer_mis.php");?>
