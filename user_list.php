<?php require_once("connection.php"); ?>
<?php 

	$user = mysqli_query($con, "SELECT * FROM users ORDER BY USER_ID ASC");
	$row_user = mysqli_fetch_assoc($user);
	
	$totalRows_user = mysqli_num_rows($user);
	
	
	
?>

<?php require_once("header.php");?>

<h2>User Accounts</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New user has been successfully added!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected user has been successfully Updated!
		
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected user has been successfully Deleted!
		
	</div>
<?php } ?>

<?php if(isset($_GET["Error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Could not delete selected user!
		
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
	<b>Total Result: <?php echo $totalRows_user; ?></b>
</div>
<?php } ?>


<?php if($totalRows_user > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<?php do { ?>
		<tr>
			<td><?php echo $row_user["USER_ID"]; ?></td>
			<td><?php echo $row_user["username"]; ?></td>
			<td>
				<a href="user_edit.php?user_id=<?php echo $row_user["USER_ID"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
				</a>
			</td>
			<td>
				<a class="delete" href="user_delete.php?user_id=<?php echo $row_user["USER_ID"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
		</tr>
	<?php } while($row_user = mysqli_fetch_assoc($user)); ?>
	
</table>
<?php } else { ?>
	<div class="alert alert-warning text-center">
		<h3 style="border:none;">No Result Found!</h3>
	</div>
<?php } ?>


<?php require_once("footer_mis.php"); ?>