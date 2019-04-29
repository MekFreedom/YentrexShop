<?php
	session_start();
    include("connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<?php
	$uid = $_SESSION["v_id"];
	$name = $_REQUEST["name"];
	$address = $_REQUEST["address"];
	$email = $_REQUEST["email"];
	$phone = $_REQUEST["phone"];
	date_default_timezone_set("Asia/Bangkok");
	$dttm = date("Y-m-d h:i:sa");
	$delivery = $_REQUEST["delivery"];
	$status = 1;
	//Save in order_head
	mysqli_query($mysqli, "BEGIN"); 
	$sql1	= "insert into order_head values(null,'$uid' ,'$dttm', '$name', '$address', '$email', '$phone', '$delivery','$status')";
	$query1	= mysqli_query($mysqli, $sql1);
	//Function  MAX() find max value
	$sql2 = "select max(o_id) as o_id from order_head where o_name='$name' and o_email='$email' and o_dttm='$dttm' ";
	$query2	= mysqli_query($mysqli, $sql2);
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];
//PHP foreach() 
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql3	= "select * from product where p_id=$id";
		$query3	= mysqli_query($mysqli, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total	= $row3['P_Price']*$qty;
		
		$sql4	= "insert into order_detail values(null, '$uid' ,'$o_id', '$id', '$qty', '$total')";
		$query4	= mysqli_query($mysqli, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($mysqli, "COMMIT");
		$msg = "Order Complete";
		foreach($_SESSION['cart'] as $id)
		{	
			//unset($_SESSION['cart'][$id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($mysqli, "ROLLBACK");  
		$msg = "Order Incomplete";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='view_order.php?o_id=<?=$o_id?>';
</script>

 




</body>
</html>