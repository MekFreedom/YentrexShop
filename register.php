<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="template.css">
	<div class="header">
		<div class="Yentrex">
			<a href="home.php">YENTREX WATCH</a>
		</div>
		<div class="top">
			<div id="toplink">
				<img src="image/product.png">
				<br>
				<a href="Product.php">Product</a>
			</div>
			<div id="toplink">
				<img src="image/login.png">
				<br>
				<a href="login.php">Login</a>
			</div>
			<div id="toplink">
				<img src="image/id-card.png">
				<br>
				<a href="register.php">Register</a>
			</div>
		</div><!--end top-->
	</div>
</head>
<body>
<div id="div_main">
		<div id="div_left">
		</div>
		<div class="info"><h2>Register</h2></div>
		<div class="content">
			<form action = "register.php" method = "POST">
				<label>Username</label>
				<input type="text" required name="USER_Username">
				<br>
				<label>Password</label>
				<input type="password" required name="USER_Password">
				<br>
				<label>First Name</label>
				<input type="text" required name="USER_FName">
				<br>
				<label>Last Name</label>
				<input type="text" required name="USER_LName">
				<br>
				<label>Gender</label>
				<select class="select" name="USER_GenderID" input type='number'>
				<option>1 Male</option>
				<option>2 Female</option>
				</select>
				<br>
				<label>Address</label>
				<input type="text" required name="USER_Address">
				<br>
				<label>Date Of Birth</label>
				<input type="date" required max="2018-11-30" name="USER_DOB">
				<br>
				<label>Email</label>
				<input type="text" required name="USER_Email">
				<br>
				<label>PhoneNo</label>
				<input type="text" required name="USER_PhoneNo">
				<br>
				<div class="align">
					<a href="home.php" >
						<input class="finishbutton" type="submit"  value="Back">
					</a>
				</div>
				<div class="align">
					<input class="finishbutton" type="submit" name = "u_signup" value="Submit">
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

<?php
if (isset($_POST['u_signup']))
{
    $fname = $_POST['USER_FName'];
	$lname = $_POST['USER_LName'];
	$gender = $_POST['USER_GenderID'];
	$address = $_POST['USER_Address'];
	$dob = $_POST['USER_DOB'];
	$email = $_POST['USER_Email'];
	$phone = $_POST['USER_PhoneNo'];
	$username = $_POST['USER_Username'];
	$password = ($_POST['USER_Password']);
	$usergroup = 2;

    $q = "INSERT INTO `user`(`USER_FName`, `USER_LName`, `USER_GenderID`, `USER_Address`, `USER_DOB`, `USER_Email`, `USER_PhoneNo`, `USER_Username`, `USER_Password`, `USERGROUP_ID`)
	VALUES ('".$fname."','".$lname."','".$gender."','".$address."','".$dob."','".$email."','".$phone."','".$username."','".$password."','".$usergroup."')";
    //echo $q;
	require_once('connect.php');
    if ($mysqli->query($q))
    {
     header("Location: Login.php");
    }
}
?>