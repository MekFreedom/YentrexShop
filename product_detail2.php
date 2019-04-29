<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php
	 require_once('connect.php');
	 $q = "select * from user ";
        $result = $mysqli->query($q);
        if(!$result){
          echo "Select failed; ".$mysqli->error;
        }
        $row = $result->fetch_array();
	?>
	<title>Product Details</title>
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
			<div id="div_left"></div>
			<table bgcolor="#ddf3da"class="content" width="600" border="0" align="center">
			  <tr><td colspan="4" bgcolor="#CCCCCC"><b>Product Details</b></td></tr>

				<?php
				//connect db
					include("connect.php");
					$id = $_GET['pid'];

					$sql = "select * from product where P_ID=$id";
					$result = mysqli_query($mysqli, $sql);
					$row = mysqli_fetch_array($result);
					//Show details
					echo "<tr>";
					echo "<td width='85' valign='top'><b>Title</b></td>";
					echo "<td colspan='2' width='50%'>" . $row["P_Name"] . "</td>";
					echo "<td width='70' rowspan='4'><img src='image/".$row["P_Pic"]." ' width='100'></td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td valign='top'><b>Detail</b></td>";
					echo "<td colspan='2'>" . $row["P_Details"] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td valign='top'><b>Price</b></td>";
					echo "<td colspan='2'>" .number_format($row["P_Price"],2) . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td valign='top'><b>Company</b></td>";
					echo "<td colspan='2' width='279'>" . $row["P_Company"] . "</td>";
					echo "</tr>";
					echo "<tr>";
				?>
				<?php if ($_SESSION['v_userrole']==1){ ?>
						<?php } else { ?>
							<td colspan='2' align='center'><a href='cart.php?pid=<?=$row['P_ID']?>&act=add'><button type="button" class="finishbutton">Add to Cart</button></a></td>
							<td colspan='2'><a href="product2.php?userid=<?=$_SESSION['v_id']?>"><button type="button" class="finishbutton">Back to Product</button></a></td>

						<?php } ?>

				<?php
					echo "</tr>";
				?>
			</table>
			<div id="div_right"></div>

	</body>
	<footer>
		<div id="div_left"></div>
		<div id="div_right"></div>
	</footer>
</div>
</html>
