<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["expense_name"])) {
		$expense_name = getValue($_POST["expense_name"]);
		
		$result = mysqli_query($con, "INSERT INTO expense VALUES (NULL, '$expense_name')");
		
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
				<input type="text" class="form-control" name="expense_name">
			</div>
			
			<input type="submit" class="btn btn-primary" value="Add expense">
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
				<input autocomplete="off" type="text" class="form-control" name="expenese_date" id="expenese_date">
			</div>
			
			<input type="submit" class="btn btn-primary" value="Add Expense">
			 
			 
			 
		</form>
		</div>
		
	</div>

</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "expense_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>





<?php require_once("footer_mis.php");?>


