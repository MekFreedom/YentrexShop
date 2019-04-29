<?php
	session_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	 $q = "select * from user ";
        $result = $mysqli->query($q);
        if(!$result){
          echo "Select failed; ".$mysqli->error;
        }
        $row = $result->fetch_array();
	?>
	<title>Confirm</title>
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
		<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
		  <table width="600" border="0" align="center" id="table">
					<tr>
					  <td width="1558" colspan="4" bgcolor="#FFDDBB">
					  <strong>Order</strong></td>
					</tr>
					<tr>
					  <td bgcolor="#F9D5E3">Product</td>
					  <td align="center" bgcolor="#F9D5E3">Price</td>
					  <td align="center" bgcolor="#F9D5E3">Quantity</td>
					  <td align="center" bgcolor="#F9D5E3">Total</td>
					</tr>
				<?php
					$total=0;
					foreach($_SESSION['cart'] as $id=>$qty)
					{
						$sql	= "select * from product where P_ID=$id";
						$query	= mysqli_query($mysqli, $sql);
						$row	= mysqli_fetch_array($query);
						$sum	= $row['P_Price']*$qty;
						$total	+= $sum;
					echo "<tr>";
					echo "<td>" . $row["P_Name"] . "</td>";
					echo "<td align='right'>" .number_format($row['P_Price'],2) ."</td>";
					echo "<td align='right'>$qty</td>";
					echo "<td align='right'>".number_format($sum,2)."</td>";
					echo "</tr>";
					}
					echo "<tr>";
					echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>Total</b></td>";
					echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
					echo "</tr>";
				?>
			</table>
		<p>

				<?php
		        $uid = $_GET['userid'];
		        $p = "select * from user where USER_ID=$uid";
		        $result = $mysqli->query($p);
		        if(!$result){
		          echo "Select failed; ".$mysqli->error;
		        }
		        $row = $result->fetch_array();

		        ?>
		<table id="table" border="0" cellspacing="0" align="center">
			<tr>
				<td colspan="2" bgcolor="#CCCCCC">Address Detail</td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE">Name</td>
				<td><input name="name" value="<?=$row['USER_FName']?>  <?=$row['USER_LName']?>" type="text" id="name" required /></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE">Address</td>
				<td><input name="address" value="<?=$row['USER_Address']?>" type="text" id="address"required></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE">Email</td>
				<td><input name="email" value="<?=$row['USER_Email']?>" type="text" id="email" required /></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE">PhoneNo</td>
				<td><input name="phone" value="<?=$row['USER_PhoneNo']?>" type="text" id="phone" required /></td>
			</tr>
			<tr>
				<td bgcolor="#EEEEEE">Delivery</td>
				<td><select value="<?=$row['D_ID']?>" class="select" input name = "delivery" type='number' id="delivery"required />
				<option>1 LineMan</option>
				<option>2 Kerry</option>
				<option>3 EMS</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center" bgcolor="#CCCCCC">
				<input class="finishbutton" type="submit" name="Submit2" value="Confirm" />
			</td>
		</tr>
		</table>
		</form>
		<div id="div_right"></div>
	</div><!--end main-->
</body>
</html>
