<?php session_start(); ?>
<?php
if (isset($_POST['u_add']))
{
    $name = $_POST['P_Name'];
	$details = $_POST['P_Details'];
	$price = $_POST['P_Price'];
	$company = $_POST['P_Company'];

	//upload image
	$ext = pathinfo(basename($_FILES['P_Pic']['name']),PATHINFO_EXTENSION);//pic type
	$new_image_name = 'img_'.uniqid().".".$ext;//new pic name
	$image_path = "image/";
	$upload_path = $image_path.$new_image_name;
	
	//uploading
	$success = move_uploaded_file($_FILES['P_Pic']['tmp_name'],$upload_path);
	
	if($success == FALSE){
		echo "Upload not success";
		exit();
	}
	
	$pic = $new_image_name;
	
    $q = "INSERT INTO `product`(`P_Name`, `P_Details`, `P_Price`, `P_Company`, `P_Pic`) 
	VALUES ('".$name."','".$details."','".$price."','".$company."','".$pic."')";
    //echo $q;
	require_once('connect.php');
    if ($mysqli->query($q))
    {
     header("Location: Product2.php?userid=".$_SESSION['v_id']."");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>
<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="template.css">
		<div class="header">
			<div class="Yentrex Watch">
				<a href="home2.php?userid=<?=$_SESSION['v_id']?>">Yentrex Watch</a>
			</div>
			<div class="top">
					<?php
						echo "<div id=\"toplink\"> Welcome"
							."<br>"
							. $_SESSION['userid']
							. "</div>";
					?>

				<div id="toplink">
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<img src="image/order.png">
						<br>
						<a href="order_staff.php?userid=<?=$_SESSION['v_id']?>">Order</a>
					<?php } else { ?>
					<?php } ?>
				</div>
				<div id="toplink">
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<img src="image/add.png">
						<br>
						<a href="addproduct.php?userid=<?=$_SESSION['v_id']?>">Add Product</a>
					<?php } else { ?>
						<img src="image/order.png">
						<br>
						<a href="order.php?userid=<?=$_SESSION['v_id']?>">Order</a>
					<?php } ?>
				</div>
				<div id="toplink">
					<img src="image/product.png">
					<br>
					<a href="Product2.php?userid=<?=$_SESSION['v_id']?>">Product</a>
				</div>
				<div id="toplink">
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<img src="image/profile.png">
						<br>
						<a href="user.php?userid=<?=$_SESSION['v_id']?>">User Profile</a>
					<?php } else { ?>
						<img src="image/edit.png">
						<br>
						<a href="edit.php?userid=<?=$_SESSION['v_id']?>">Edit</a>
					<?php } ?>
				</div>
				<div id="toplink">
					<img src="image/login.png">
					<br>
					<a href="logout.php">Logout</a>
				</div>
			</div>
		</div>
</head>
<body>
<div id="div_main">
		<div id="div_left">
		</div>
		<div class="info"><h2>Add Products</h2></div>
		<div class="content">
			<form action = "addproduct.php" method = "POST" enctype = "multipart/form-data">
				<label>Name</label>
				<input type="text" required name="P_Name">
				<br>
				<label>Details</label>
				<input type="text" name="P_Details">
				<br>
				<label>Price</label>
				<input type="text" required name="P_Price">
				<br>
				<label>Company</label>
				<input type="text" required name="P_Company">
				<br>
				<label>Picture</label>
				<input type= "file" name = "P_Pic"/>
				<br>
				<div class="align">
					<a href="product2.php" >
						<input class="finishbutton" type="submit"  value="Back">
					</a>
				</div>
				<div class="align">
					<input class="finishbutton" type="submit" name = "u_add" value="Submit">
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
