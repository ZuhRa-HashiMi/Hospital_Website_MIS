<?php require_once("header.php");?>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h1>Add New Staff</h1>
	</div>
	
	<div class="panel-body">
	<form method="post" enctype="multipart/form-data">
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<div class="input-group">
				<span class="input-group-addon">
					Firstname:
				</span>
				<input required type="text" name="firstname" class="form-control">
			</div>
		
			<div class="input-group">
				<span class="input-group-addon">
					Lastname:
				</span>
				<input required type="text" name="lastname" class="form-control">
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Gender:
				</span>  &nbsp;
				<label><input checked type="radio" name="gender" value="0"> Male</label> &nbsp;
				<label><input type="radio" name="gender" value="1"> Female</label>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">
					Birth Year:
				</span>
				<select name="dob" class="form-control">
					<?php
						$year = date("Y");
						$max = $year - 18;
						$min = $year - 65;
						
						for($x=$max; $x>$min; $x--) {
						?>
							<option><?php echo $x; ?></option>	
						<?php } ?>
					
				</select>
			</div>
			</form>
<?php require_once("footer_mis.php");?>