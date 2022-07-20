 <?php 
 
    	require_once("connection.php");
		if(isset($_SESSION["user_id"])) {
		header("Location:home.php");
	}
		
		
		
		
        if(isset($_POST["username"])) {
		$username = ($_POST["username"]);
		$password = ($_POST["password"]);
		$result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = PASSWORD('$password') ");
		if(mysqli_num_rows($result) == 1) {
			$row_result = mysqli_fetch_assoc($result);
			$_SESSION["user_id"] = $row_result["user_id"];
			
			header("location:home.php");
			
			}
			else {
			header("location:login.php?login=failed");
		}
		
		
		}
		
		?>
 
 
 
 <?php require_once("header.php");?>
              

	         
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">

	<div class="panel panel-primary">
	
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
	
		</div>
	
	</div>
	
	</div>


<?php require_once("footer_website.php");?>

