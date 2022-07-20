<div class="panel-heading text-center">
			<h1>Login to MIS</h1>
		</div>
	
		<div class="panel-body">
		
			<?php if(isset($_GET["login"])) { ?>
				<div class="alert alert-danger">
					Incorrect Username or Password
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["logout"])) { ?>
				<div class="alert alert-success">
					You are successfully logged out!
				</div>
			<?php } ?>
			
			<?php if(isset($_GET["notlogin"])) { ?>
				<div class="alert alert-warning">
					Please login first!
				</div>
			<?php } ?>                     


                          <form method="post">
				
				<div class="input-group">
					<span class="input-group-addon">
						Username:
					</span>
					<input type="text" class="form-control" name="username">
				</div>
				
				<div class="input-group">
					<span class="input-group-addon">
						Password:
					</span>
					<input type="password" class="form-control" name="password">
				</div>
				
				<input type="submit" value="Login" class="btn btn-primary">
				
			</form>


<?php require_once("footer_website.php"); ?>
