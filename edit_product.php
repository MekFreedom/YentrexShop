<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Products</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="template.css">
		<div class="header">
			<div class="Yentrex Watch">
				<a href="home2.php?userid=<?=$_SESSION['v_id']?>">Yentrex Watch</a>
			</div>
			<div class="top">
				<div id="toplink">
					<?php
						echo "Welcome";
					?>
					<br>
					<?php
						echo $_SESSION['userid'];
					?>
				</div>
				<div id="toplink">		
					<a href="Product2.php?userid=<?=$_SESSION['v_id']?>">Product</a>
				</div>
				<div id="toplink">					
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<a href="user.php?userid=<?=$_SESSION['v_id']?>">User Profile</a>
					<?php } else { ?>
						<a href="edit.php?userid=<?=$_SESSION['v_id']?>">Edit</a>
					<?php } ?>
				</div>
				<div id="toplink">
					<a href="logout.php">Logout</a>
				</div>
			</div>
		</div>
</head>
<body>
<div id="div_main">
		<div id="div_left">
		</div>
		<div class="info"><h2>Edit Products</h2></div>
		<div class="content">
		<?php 
        require_once('connect.php');
        $id = $_GET['pid'];
        $q = "select * from product where P_ID=$id";
        $result = $mysqli->query($q);
        if(!$result){
          echo "Select failed; ".$mysqli->error;
        }
        $row = $result->fetch_array(); 

        ?>
			<form action = "update_product.php" method = "POST" enctype = "multipart/form-data">
				<label>ID</label>
				<input value="<?=$id?>" type="text" required name="P_ID" readonly>
				<br>
				<label>Name</label>
				<input value="<?=$row['P_Name']?>" type="text" required name="P_Name">
				<br>
				<label>Details</label>
				<input value="<?=$row['P_Details']?>" type="text" name="P_Details">
				<br>
				<label>Price</label>
				<input value="<?=$row['P_Price']?>" type="text" required name="P_Price">
				<br>
				<label>Company</label>
				<input value="<?=$row['P_Company']?>" type="text" required name="P_Company">
				<br>
				<div class="align">
					<a href="product2.php" >
						<input class="finishbutton" type="submit"  value="Back">
					</a>
				</div>
				<div class="align">
					<input class="finishbutton" type="submit" name = "u_p_edit" value="Submit">
				</div>
			</form>
		</div> <!-- end div_content -->
		<div id="div_right"></div>
	</div> <!-- end div_main -->
</body>
<footer class="foot">
	Made by YENTREX Club since 2018
</footer>
</html>
