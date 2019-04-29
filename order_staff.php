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
	<title>Order</title>
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


<body><!-- onload="alert('Welcome!!! Pop up text at home.html line 15')" -->
	<div id="div_main">
		<div id="div_left"></div>
		<div class="info"><h2>Order History<h2></div>
			<!-- start of the content -->
		<div class="content">
			<!--**************************************************************	-->
			<table class="content" id="table" border="1" align="center">
				<thead>
					<tr>
						<td align="center" bgcolor="#CCCCCC" scope="col">OrderID</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">USERID</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Date</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Details</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Payment</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Status</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$q = "SELECT * FROM order_head
						WHERE 1";
						$result=$mysqli->query($q);
						while(!$result){
							echo "Select failed. Error: ".$mysqli->error ;
							break;
						}
						while($row=$result->fetch_array()){ ?>
								 <tr>
									<td> <?=$row['o_id']?></td>
									<td> <?=$row['USER_ID']?></td>
									<td> <?=$row['o_dttm']?></td>
									<input type="hidden" name="o_id" value="<?=$o_id?>">
									<td align='center'><a href="view_order_staff.php?o_id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">View</button></a></td>
									<td align='center'><a href="view_payment_staff.php?o_id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">View</button></a></td>
									<?php if ($_SESSION['v_userrole']==1){ ?>
									<form action="order_status.php?o_id=<?=$row['o_id']?>" method="post">
										<td align='center'>
										<select value="<?=$row['status_id']?>" class="select" name="status_id" input type='number'>
											<option>1 Waiting for payment</option>
											<option>2 Payment confirmed</option>
											<option>3 Waiting for shipment</option>
											<option>4 Order has been sent</option>
											<option>5 Order has been delivered</option>
										</select>
										<br>
										<input type="submit" name = "o_status" value="Submit">
										</td>
									</form>
									<?php } else { ?>
									<?php } ?>
								</tr>
					<?php } ?>
					<?php $count=$result->num_rows;
						  echo "<tr><td colspan=6 align=right>Total $count records</td><td colspan=6 align=right> </td></tr>";
						  $result->free();
					?>
				</tbody>
			</table>
		</div>
		<div id="div_left"></div>
</body>

<footer class="foot">
	<div id="div_left"></div>
	Made by YENTREX Club since 2018
	<div id="div_right"></div>
</footer>
	</div> <!-- end div_main-->
</html>
