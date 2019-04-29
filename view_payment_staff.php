<?php session_start(); ?>
<?php 
    require_once('connect.php');
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
					<?php
						echo "<div id=\"toplink\"> Welcome"
							."<br>"
							. $_SESSION['userid']
							. "</div>";
					?>
				<div id="toplink">
					<?php if ($_SESSION['v_userrole']==1){ ?>
						<img src="image/add.png">
						<br>
						<a href="addproduct.php?userid=<?=$_SESSION['v_id']?>">Add Product</a>
					<?php } else { ?>
						<img src="image/order.png">
						<br>
						<a href="order2.php?userid=<?=$_SESSION['v_id']?>">Order</a>
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
		<div id="div_content" >
			<!--%%%%% Main block %%%%-->
			<div class="info"><h2>Payment</h2></div>
			<table id="table" width="900" border="1" align="center" >
				
				<tr>
					<td width="91" align="center" bgcolor="#CCCCCC"><strong>#</strong></td>
					<td width="200" align="center" bgcolor="#CCCCCC"><strong>OrderID</strong></td>
					<td width="50" align="center" bgcolor="#CCCCCC"><strong>UserID</strong></td>
					<td width="50" align="center" bgcolor="#CCCCCC"><strong>Payment Date</strong></td>
					<td width="100" align="center" bgcolor="#CCCCCC"><strong>Payment Bank</strong></td>
					<td width="91" align="center" bgcolor="#CCCCCC"><strong>Payment Picture</strong></td>
					
				</tr>
				<?php 
					$q="select * from payment,order_head 
					where order_head.USER_ID = payment.USER_ID AND payment.o_id = order_head.o_id";
					$result=$mysqli->query($q);
					while(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						break;
					}
					while($row=$result->fetch_array()){ ?>
						<tr>
							<td><?=$row['payment_ID']?></td>
							<td><?=$row['o_id']?> </td>
							<td><?=$row['USER_ID']?> </td>
							<td><?=$row['payment_date']?></td>
							<td><?=$row['payment_bank']?></td>
							<?php
							echo "<td align='center'><img src='payment/".$row["payment_pic"]."' width='100' height='100'></td>";
							?>
						</tr>
					<?php } ?>
			</table>		
		</div>
</body>
<footer class="foot">
	<div id="div_left"></div>
	Made by YENTREX Club since 2018
	<div id="div_right"></div>
</footer>
	</div> <!-- end div_main-->
</html>
