<?php 
    if(!isset($_SESSION)) { 
		session_start();
	}
	
	if(isset($_SESSION["local"])) {
		require_once($_SESSION["local"]);
	}
	else {
		require_once("local/en.php");
	}
		
?>


<!DOCTYPE html>
<html>
<head>
<title>HMIS</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="cal/calendar-blue2.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="cal/calendar.js"></script>
<script type="text/javascript" src="cal/calendar-en.js"></script>
<script type="text/javascript" src="cal/calendar-setup.js"></script>
<script type="text/javascript" src="js/script.js"></script>


	<script src="sliderengine/jquery.js"></script>
    <script src="sliderengine/amazingslider.js"></script>
    <link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
    <script src="sliderengine/initslider-1.js"></script>




</head>
<body>
<div class="main">
  <div class="header noprint">
  <?php if(!isset($_SESSION["user_id"])) { ?>
  <a href="login.php" id="login" class="pull-right">
  Login
  </a>
  <?php } else { ?>
  <a href="logout.php" id="login" class="pull-right">
  Logout
  </a>
  <?php } ?>
  
  
	<form action="change_language.php" method="get" id="language" style="margin-top:5px;margin-right:5px;float:right;">
		<select name="lang" onchange="document.getElementById('language').submit();">
			<option value="en">English</option>
			<option value="fa">دری</option>
			<option value="ps">پشتو</option>
		</select>
	</form>
  
  
  
  
  
  
  
    <div class="block_header">
      <div class="logo"><a href="index.html"><img src="images/logo_1.gif" width="331" border="0" alt="logo" /></a></div>
      <div class="search">
        <form id="form1" name="form1" method="post" action="">
          <label>
            <input name="q" type="text" class="keywords" id="textfield" maxlength="50" />
            <input name="b" type="image" src="images/search.gif" class="button" />
          </label>
        </form>
      </div>
      <<div class="clr"></div>
      <div class="resize_menu">
        <div class="">
          
		 <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
			
				<?php if(!isset($_SESSION["user_id"])) { ?>
			
				<ul class="nav navbar-nav" id="nav-top">
                	<li><a href="index.php"><?php echo $menu_home; ?></a></li>
                	<li><a href="index.php"><?php echo $menu_gallery; ?></a></li>
                	<li><a href="index.php"><?php echo $menu_services; ?></a></li>
                	<li><a href="index.php"><?php echo $menu_news; ?></a></li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown"><?php echo $menu_aboutus; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Information</a></li>
							<li><a href="#">History</a></li>
							<li><a href="#">Cheif Biography</a></li>
						</ul>
					</li>
                	<li><a href="index.php"><?php echo $menu_contactus; ?></a></li>                	
                </ul>
				
				<?php } else { ?>
			
				<ul class="nav navbar-nav" id="nav-top">
					<li class="dropdown"><a href="#" data-toggle="dropdown">Department <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                            <li><a href="department_add.php">Add New Department</a></li>
                            <li><a href="department_list.php">Department List</a></li>
                        	<li><a href="room_add.php">Rooms</a></li>
                        </ul>                    
                    </li>
                	<li class="dropdown"><a href="#" data-toggle="dropdown">Patient <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
							<li><a href="#">Register New Patient</a></li>
                        	<li><a href="#">Patient List</a></li>
                        	<li><a href="#">Patient Test</a></li>
                        	<li><a href="#">Patient Medicine</a></li>
                        	<li><a href="#">Patient Surgery</a></li>
                        	<li><a href="#">Patient Admit</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Staff <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="staff_add.php">Add New Staff</a></li>
                            <li><a href="staff_list.php">Staff List</a></li>
                            <li><a href="attendance_list.php">Staff Attendance</a></li>
                            <li><a href="overtime_list.php">Staff Overtime</a></li>
                            <li><a href="salary_list.php">Staff Salary</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Pharmacy <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="placement_add.php">New Placement</a></li>
                            <li><a href="placement_list.php">Placement List</a></li>
                            <li><a href="placement_document.php">Placement Document</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Laboratoar <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="user_add.php">Add New User</a></li>
                            <li><a href="user_list.php">User Accounts</a></li>
                            <li><a href="track_changes.php">Track Changes</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Surgery <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="user_add.php">Add New User</a></li>
                            <li><a href="user_list.php">User Accounts</a></li>
                            <li><a href="track_changes.php">Track Changes</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Blood Bank <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="user_add.php">Add New User</a></li>
                            <li><a href="user_list.php">User Accounts</a></li>
                            <li><a href="track_changes.php">Track Changes</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Finance <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="income_add.php">New Income</a></li>
                            <li><a href="income_list.php">Income List</a></li>
                            <li><a href="expense_add.php">New Expense</a></li>
                            <li><a href="expense_list.php">Expense List</a></li>
                            <li><a href="salary_list.php">Staff Salary</a></li>
                        </ul>                    
                    </li>
					<li class="dropdown"><a href="#" data-toggle="dropdown">Settings <span class="caret"></span></a>
                    	<ul class="dropdown-menu">
                        	<li><a href="user_list.php">Users</a></li>
                        	<li><a href="report_placement.php">Website</a></li>
                        	<li><a href="report_placement.php">Stock</a></li>
                        	<li><a href="report_placement.php">Partner</a></li>
                        	<li><a href="report_placement.php">Student Practice</a></li>
                        	<li><a href="report_placement.php">Report</a></li>
                        </ul>                    
                    </li>
                </ul>
				<?php } ?>
            </div>  
        </nav>
		  </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="main_body_resize">
    <div class="main_body">
      <div class="clr"></div>
    </div>
  </div>
  <div class="body_resize">
    <div class="body">
      <div class="Welcome col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  
		<?php if(isset($_GET["authorize"])) { ?>
			<div class="alert alert-warning">
				You are not authorized to access the page!
			</div>
		<?php } ?>
	  
	  