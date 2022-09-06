<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["expences_to"])) {
		$expense_to = getValue($_POST["expences_to"]);
		$amount = getValue($_POST["amount"]);
		$currency = getValue($_POST["currency"]);
		$expense_date = getValue($_POST["expenes_date"]);
		
		$result = mysqli_query($con, "INSERT INTO expenes VALUES (NULL, '$expense_to', $amount, '$currency', '$expense_date')");
		
		if($result) {
			header("location:expense_list.php?add=done");
		}
		else {
			header("location:expense_add.php?error=notadd");
		}
		
	}
	
?>


<?php require_once("header.php");?>



<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">


<div class="panel panel-primary">
	
	<div class="panel-heading">
		<h1>Add New Expense</h1>
	</div>

	<div class="panel-body">
	<?php if(isset($_GET["error"])) { ?>
			<div class="alert alert-danger">
				Could not add new expense!
			</div>
		<?php } ?>
	
		<form method="post">
			
			<div class="input-group">
				<span class="input-group-addon">
					expense To:
				</span>
				<input type="text" class="form-control" name="expences_to">
			</div>

			<div class="input-group">
				<span class="input-group-addon">
					Amount:
				</span>
				<input type="text" class="form-control" name="amount">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Currency:
				</span>
				<select class="form-control" name="currency">
					<option>AFN</option>
					<option>USD</option>
					<option>EUR</option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Expense Date:
				</span>
				<input autocomplete="off" type="text" class="form-control" name="expenes_date" id="expenes_date">
			</div>
			
			<input type="submit" class="btn btn-primary" value="Add Expense">
			 
			 
			 
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


