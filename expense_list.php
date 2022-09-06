<?php require_once("connection.php"); ?>
<?php 

    
	$condition = "";

	if(isset($_GET["q"])) {
		$search = getValue($_GET["q"]);
		$condition = " WHERE expences_to LIKE '%$search%' ";
	}
	
	$expense = mysqli_query($con, "SELECT * FROM expenes $condition ORDER BY expenes_id DESC");
	$row_expense = mysqli_fetch_assoc($expense);
	
	$totalRows_expense = mysqli_num_rows($expense);
	
	
	
?>

<?php require_once("header.php");?>

<h2>Expense List</h2>

<?php if(isset($_GET["add"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		New expense has been successfully added!
	</div>
<?php } ?>

<?php if(isset($_GET["edit"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected expense has been successfully Updated!
		
	</div>
<?php } ?>

<?php if(isset($_GET["delete"])) { ?>
	<div class="alert alert-success alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Selected expense has been successfully Deleted!
		
	</div>
<?php } ?>

<?php if(isset($_GET["Error"])) { ?>
	<div class="alert alert-danger alert-dismissable">
		<button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
		Could not delete selected expense!
		
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
	<b>Total Result: <?php echo $totalRows_expense; ?></b>
</div>
<?php } ?>


<?php if($totalRows_expense > 0) { ?>
<table class="table table-striped">
	<tr>
		<th>ID</th>
		<th>Expense To</th>
		<th>Amount</th>
		<th>Date</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<?php $totalAFN = 0; $totalUSD = 0; $totalEUR = 0;
			do { ?>
		<tr>
			<td><?php echo $row_expense["expenes_id"]; ?></td>
			<td><?php echo $row_expense["expences_to"]; ?></td>
			<td><?php echo number_format($row_expense["amount"], 0) ; ?> <?php echo $row_expense["currency"]; ?></td>
			
			<td><?php echo $row_expense["expenes_date"]; ?></td>
			<?php
				if($row_expense["currency"] == "USD") {
					$totalUSD += $row_expense["amount"];
				}
				else if($row_expense["currency"] == "AFN") {
					$totalAFN += $row_expense["amount"];
				}
				else if($row_expense["currency"] == "EUR") {
					$totalEUR += $row_expense["amount"];
				}
			?>
			<td>
				<a href="expense_edit.php?expenes_id=<?php echo $row_expense["expenes_id"]; ?>">
					<span class="glyphicon glyphicon-edit"></span>
				</a>
			</td>
			<td>
				<a class="delete" href="expense_delete.php?expenes_id=<?php echo $row_expense["expenes_id"]; ?>">
					<span class="glyphicon glyphicon-trash"></span>
				</a>
			</td>
		</tr>
	<?php } while($row_expense = mysqli_fetch_assoc($expense)); ?>
	
	<tr>
		<td></td>
		<td><b>Total Expense:</b></td>
		<td>
			<b>
			<?php echo number_format($totalAFN, 0); ?> AFN<br>
			<?php echo number_format($totalUSD, 0); ?> USD<br>
			<?php echo number_format($totalEUR, 0); ?> EUR<br>
			</b>
		</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
</table>
<?php } else { ?>
	<div class="alert alert-warning text-center">
		<h3 style="border:none;">No Result Found!</h3>
	</div>
<?php } ?>


<?php require_once("footer_mis.php"); ?>