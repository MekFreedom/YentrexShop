<?php session_start(); ?><!DOCTYPE html>
<html>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" type="text/css" href="template.css">
<head>
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
<!--
	<div class="login">
	E-mail<br>
	<input type="text" name="e-mail" placeholder="email or user ID">
	<br>
	password<br>
	<input type="password" name="password" placeholder="password">
	<br><br>
	<input class="submit" type="submit" name="submit" value="submit">
</div>
-->
<div id="div_main">
		<div id="div_left">

		</div>
		<div class="info"><h2>Login</h2></div>
		<div class="content">
			<form action="checklogin.php" method="POST">
				<label>Username</label>
				<input type="text" name="username">
				<br>
				<label>Password</label>
				<input type="password" name="password">
				<br>
				<div class="align">
					<input class="finishbutton" type="submit" name="u_login" value="Login">
				</div>
				<div class="align">
					<input class="finishbutton" type="reset">
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
