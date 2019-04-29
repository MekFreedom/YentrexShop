<?php session_start(); ?>
<?php
if (isset($_POST['u_add']))
{
    $id = $_POST['o_id'];
	$uid = $_POST['USER_ID'];
	$date = $_POST['payment_date'];
	$bank = $_POST['payment_bank'];

	//upload image
	$ext = pathinfo(basename($_FILES['payment_pic']['name']),PATHINFO_EXTENSION);//pic type
	$new_image_name = 'img_'.uniqid().".".$ext;//new pic name
	$image_path = "payment/";
	$upload_path = $image_path.$new_image_name;

	//uploading
	$success = move_uploaded_file($_FILES['payment_pic']['tmp_name'],$upload_path);

	if($success == FALSE){
		echo "Upload not success";
		exit();
	}

	$pic = $new_image_name;

    $q = "INSERT INTO `payment`(`o_id`, `USER_ID`, `payment_date`, `payment_bank`, `payment_pic`)
	VALUES ('".$id."','".$uid."','".$date."','".$bank."','".$pic."')";
    //echo $q;
	require_once('connect.php');
    if ($mysqli->query($q))
    {
     header("Location: order.php?userid=".$_SESSION['v_id']."");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Payment</title>
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
					<?php if ($_SESSION['v_userrole']==1){ ?>
					<?php } else { ?>
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
		<div class="info"><h2>Order Payment</h2></div>
		<div class="content">
			<form action = "order_payment.php" method = "POST" enctype = "multipart/form-data">
				<label>OrderID</label>
				<input type="text" required name="o_id">
				<br>
				<label>UserID</label>
				<input type="text" required name="USER_ID">
				<br>
				<label>Payment Date</label>
				<input type="date" required max="2018-11-30" name="payment_date">
				<br>
				<label>Bank</label>
				<input type="text" required name="payment_bank">
				<br>
				<label>Picture</label>
				<input type= "file" name = "payment_pic"/>
				<br>
				<div class="align">
					<a href="order.php?userid=<?=$_SESSION['v_id']?>" >
						<input class="finishbutton" type="submit"  value="Back to Order">
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
