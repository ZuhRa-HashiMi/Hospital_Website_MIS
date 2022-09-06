<?php require_once("connection.php"); ?>
<?php

    $expense_id=getValue($_GET["expenes_id"]);
	$expense=mysqli_query($con, "SELECT * FROM expenes WHERE expenes_id= $expense_id");
	$row_expense=mysqli_fetch_assoc($expense);



	
	if(isset($_POST["expences_to"])) {
		$expense_to = getValue($_POST["expences_to"]);
		$amount = getValue($_POST["amount"]);
		$currency = getValue($_POST["currency"]);
		$expense_date = getValue($_POST["expenes_date"]);
		
		$result = mysqli_query($con, "UPDATE expenes SET expences_to='$expense_to', amount=$amount, currency='$currency', expenes_date='$expense_date' WHERE expenes_id=$expense_id");
		
		if($result) {
			header("location:expense_list.php?edit=done");
		}
		else {
			header("location:expense_edit.php?error=notedit?expenes_id=$expense_id");
		}
		
	}
	
?>


<?php require_once("header.php");?>



<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">


<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h1>Edit Expense</h1>
	</div>

	<div class="panel-body">
	<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not save changes!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					Expense To:
				</span>
				<input value="<?php echo $row_expense["expences_to"];?>" type="text" class="form-control" name="expences_to">
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					Amount:
				</span>
				<input  value="<?php echo $row_expense["amount"];?>" type="text" class="form-control" name="amount">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Currency:
				</span>
				<select class="form-control" name="currency">
					<option <?php if($row_expense["currency"]=="AFN") echo "selected" ;?> >AFN</option>
					<option  <?php if($row_expense["currency"]=="USD") echo "selected" ;?> >USD</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Expense Date:
				</span>
				<input autocomplete="off"  value="<?php echo $row_expense["expenes_date"];?>" type="text" class="form-control" name="expenes_date" id="expenes_date">
			</div>
			
			<input type="submit" class="btn btn-primary" value="save changes">
			 
			 
			 
		</form>
		</div>
		
	</div>

</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "expenes_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>





<?php require_once("footer_mis.php");?>


