<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product List</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="template.css">
		<div class="header">
			<div class="Yentrex Watch">
				<a href="home.php">Yentrex Watch</a>
			</div>
			<div class="top">
				<div id="toplink">
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
				</div>
			</div>
		</div>
</head>
<div id="div_main">
	<body>
		<table class"content" id="table" width="900" border="1" align="center" bordercolor="#666666">
			<tr>
				<td width="91" align="center" bgcolor="#CCCCCC"><strong>Picture</strong></td>
				<td width="200" align="center" bgcolor="#CCCCCC"><strong>Name</strong></td>
				<td width="50" align="center" bgcolor="#CCCCCC"><strong>Price</strong></td>
				<td width="50" align="center" bgcolor="#CCCCCC"><strong>Company</strong></td>
				<td width="100" align="center" bgcolor="#CCCCCC"><strong>Detail</strong></td>
			</tr>
			<?php
			//connect db
			include("connect.php");
				$sql = "select * from product order by P_ID";  //Show all data
				$result = mysqli_query($mysqli, $sql);
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td align='center'><img src='image/".$row["P_Pic"]."' width='100' height='100'></td>";
					echo "<td align='center'>" . $row["P_Name"] . "</td>";
					echo "<td align='center'>" .number_format($row["P_Price"],2). "</td>";
					echo "<td align='center'>" . $row["P_Company"] . "</td>";
			?>
					<td align='center'><a href="product_detail.php?pid=<?=$row['P_ID']?>"><button type="button" class="btn btn-warning btn-sm">Click</button></a></td>
			<?php
					echo "</tr>";
				}
			?>
		</table>
	</body>
<body>

</body>
<footer class="foot">
	<div id="div_left"></div>
	Made by YENTREX Club since 2018
	<div id="div_right"></div>
</footer>
</div>
</html>
