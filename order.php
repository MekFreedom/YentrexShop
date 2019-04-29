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
						<img src="image/add.png">
						<br>
						<a href="addproduct.php?userid=<?=$_SESSION['v_id']?>">Add Product</a>
					<?php } else { ?>
						<img src="image/order.png">
						<br>
						<a href="order.php">Order</a>
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
		<div class="info"><h2>Order History<h2></div>
			<!-- start of the content -->
		<div class="content"><!--line 133 width:80%-->
			<!--**************************************************************	-->
			<table class="content" id="table" style="" border="1" align="center">
				<thead>
					<tr>
						<td align="center" bgcolor="#CCCCCC" scope="col">OrderID</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">UserID</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Date</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Details</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Payment</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Order Status</td>
						<td align="center" bgcolor="#CCCCCC" scope="col">Delete</td>
					</tr>
				</thead>
				<tbody>
					<?php
						  $q = "SELECT * FROM order_head,status
							WHERE order_head.USER_ID = ".$_SESSION['v_id']." AND order_head.status_id = status.status_id";
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
									<td align='center'><a href="view_order2.php?o_id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">View</button></a></td>
									<td align='center'>
									<a href="order_payment.php?o_id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">Add</button></a>
									<a href="view_payment.php?o_id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">View</button></a>
									</td>
									<?php if ($_SESSION['v_userrole']==1){ ?>
										<td align='center'><a href="order_status.php?0id=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">Change Status</button></a></td>
									<?php } else { ?>
										<td><?=$row['status_name']?></td>
									<?php } ?>
									<td align='center'><a href="del_order.php?oid=<?=$row['o_id']?>"><button type="button" class="btn btn-warning btn-sm">Delete</button></a></td>
								</tr>
					<?php } ?>
					<?php $count=$result->num_rows;
						  echo "<tr><td colspan=7 align=right>Total $count records</td><td colspan=8 align=right> </td></tr>";
						  $result->free();
					?>
				</tbody>
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
