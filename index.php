<?php require_once("connection.php"); ?>
<?php
	$staff = mysqli_query($con, "SELECT * FROM staff");
	$row_staff = mysqli_fetch_assoc($staff);
?>




<?php require_once("header.php");?>



		
		<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:900px;padding-left:0px; padding-right:250px;margin:0px auto 0px;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
				<?php do { ?>
					<li>
						<img src="<?php echo $row_staff["photo"]; ?>" alt="<?php echo $row_staff["firstname"]; ?>" />
					</li>
				<?php } while($row_staff = mysqli_fetch_assoc($staff)); ?>
            </ul>
			
			<?php
				$staff = mysqli_query($con, "SELECT * FROM staff");
				$row_staff = mysqli_fetch_assoc($staff);
			?>
			
			
            <ul class="amazingslider-thumbnails" style="display:none;">
				<?php do { ?>
					<li><img src="<?php echo $row_staff["photo"]; ?>" alt="<?php echo $row_staff["firstname"]; ?>" /></li>                
				<?php } while($row_staff = mysqli_fetch_assoc($staff));  ?>
            </ul>
        </div>
    </div>

		<br><br>






        <h2>Welcome to our website </h2>
        <p><span>Simply dummy text of the printing and typesetting industry.</span></p>
        <div class="bg"></div>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since thes, when an unknown printer.<a href="#">Simply dummy text of the printing and typesetting industry</a>. Lorem Ipsum has been the industry's standard dummy text ever since thes, when an unknown printer.Simply dummy text of the printing and typesetting industry. <br />
          Lorem Ipsum has been the industry's standard dummy text ever since thes, when an unknown printer.</p>
        <div class="bg"></div>
        <h2>Opening Title</h2>
        <p>Dummy text of the printing and typesetting industry.</p>
        <p>Been the industry's standard dummy text ever since thes, when rinter.Simply dummy text of the printing and <a href="#">typesetting industry. Lorem Ipsum </a>has been the industry's standard dummy text ever since thes, when an unknown printer.Simply dummy text of the printing and typesetting industry. </p>
        <div class="bg"></div>
        <h2>What we offer</h2>
        <p>Been the industry's standard dummy text ever since thes, when rinter.Simply dummy text orem Ipsum has  standard dummy text ever since thes, when an unknown printer.Simply dummy text of the printing and typesetting industry. </p>
        <p>&nbsp;</p>
        <ul>
          <li>Been the industry's standard dummy text ever since thes, when rinter.</li>
          <li>Simply dummy text orem Ipsum has  standard dummy text ever since thes, when an unknown. </li>
          <li>Undustry's standard dummy text ever since thes, when rinter.</li>
        </ul>
        <?php require_once("footer_website.php");?>