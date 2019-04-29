<?php
	session_start();

	$id = $_REQUEST['pid'];
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($id))
	{
		if(isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]++;
		}
		else
		{
			$_SESSION['cart'][$id]=1;
		}
	}

	if($act=='remove' && !empty($id))  //cancel order
	{
		unset($_SESSION['cart'][$id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $id=>$amount)
		{
			$_SESSION['cart'][$id]=$amount;
		}
	}
?>

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
	<title>Cart</title>
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
			<form id="frmcart" name="frmcart" method="post" action="?act=update">
			  <table width="600" border="0" align="center" id="table">
				<tr>
				  <td colspan="5" bgcolor="#CCCCCC">
				  <b>Cart</span></td>
				</tr>
				<tr>
				  <td bgcolor="#EAEAEA">Product</td>
				  <td align="center" bgcolor="#EAEAEA">Price</td>
				  <td align="center" bgcolor="#EAEAEA">Quantity</td>
				  <td align="center" bgcolor="#EAEAEA">Total</td>
				  <td align="center" bgcolor="#EAEAEA">Delete</td>
				</tr>
					<?php
					$total=0;
					if(!empty($_SESSION['cart']))
					{
						include("connect.php");
						foreach($_SESSION['cart'] as $id=>$qty)
						{
							$sql = "select * from product where P_ID=$id";
							$query = mysqli_query($mysqli, $sql);
							$row = mysqli_fetch_array($query);
							$sum = $row['P_Price'] * $qty;
							$total += $sum;
							echo "<tr>";
							echo "<td width='334'>" . $row["P_Name"] . "</td>";
							echo "<td width='46' align='right'>" .number_format($row["P_Price"],2) . "</td>";
							echo "<td width='57' align='right'>";
							echo "<input type='text' name='amount[$id]' value='$qty' size='2'/></td>";
							echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
							//remove product
							echo "<td width='46' align='center'><a href='cart.php?pid=$id&act=remove'><button class='finishbutton'>Delete</button></a></td>";
							echo "</tr>";
						}
						echo "<tr>";
						echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>Total</b></td>";
						echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
						echo "<td align='left' bgcolor='#CEE7FF'></td>";
						echo "</tr>";
					}
					?>
					<tr>
						<td><a href="product2.php?userid=<?=$_SESSION['v_id']?>"><button type="button" class="finishbutton">Back to Product</button></a></td>
						<td colspan="2">
							<input class="finishbutton" type="submit" name="button" id="button" value="Calculate" />
						</td>
							<input type="hidden" name="pid" value="<?=$id?>">
						<td colspan="2">
							<input class="finishbutton" type="button" name="Submit2" value="Order" onclick="window.location='confirm.php?userid=<?=$_SESSION['v_id']?>';" />
						</td>
					</tr>
				</table>
			</form>
			<div id="div_right"></div>
	</body>
	<footer class="foot">
		<div id="div_left"></div>
		Made by YENTREX Club since 2018
		<div id="div_right"></div>
	</footer>
</div><!--end main-->
</html>
