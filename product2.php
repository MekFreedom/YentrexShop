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
	<title>Product Lists</title>
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
</head

	<body>
		<div id="div_main">
			<div id="div_left"></div>
			<div class="info"><h2>Product<h2></div>
			<table class="content" id="table" width="900" border="1" align="center" bordercolor="#666666">
				<tr>
					<td align="center" bgcolor="#CCCCCC"><strong>Picture</strong></td>
					<td align="center" bgcolor="#CCCCCC"><strong>Name</strong></td>
					<td align="center" bgcolor="#CCCCCC"><strong>Price</strong></td>
					<td align="center" bgcolor="#CCCCCC"><strong>Company</strong></td>
					<td align="center" bgcolor="#CCCCCC"><strong>Detail</strong></td>
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<td  align="center" bgcolor="#CCCCCC"><strong>Edit</strong></td>
						<td  align="center" bgcolor="#CCCCCC"><strong>Delete</strong></td>
					<?php } else { ?>
					<?php } ?>
				</tr>
				<?php
				//connect db
				include("connect.php");
					$sql = "select * from product order by P_ID";  //Show all data
					$result = mysqli_query($mysqli, $sql);
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td class='proimg' align='center'><img src='image/".$row["P_Pic"]."' width='100' height='100'></td>";
						echo "<td align='center'>" . $row["P_Name"] . "</td>";
						echo "<td align='center'>" .number_format($row["P_Price"],2). "</td>";
						echo "<td align='center'>" . $row["P_Company"] . "</td>";
				?>
						<td align='center'><a href="product_detail2.php?pid=<?=$row['P_ID']?>"><button type="button" class="btn btn-warning btn-sm">Click</button></a></td>
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<td align='center'><a href="edit_product.php?pid=<?=$row['P_ID']?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a></td>
						<?php } else { ?>
						<?php } ?>
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<td align='center'><a href="del_product.php?pid=<?=$row['P_ID']?>"><button type="button" class="btn btn-warning btn-sm">Delete</button></a></td>
						<?php } else { ?>
						<?php } ?>
				<?php
						echo "</tr>";
					}
				?>
			</table>
			<div id="div_right"></div>
		</div>
	</body>
<footer class="foot">
	Made by YENTREX Club since 2018
</footer>
</html>
