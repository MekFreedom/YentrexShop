
<?php

	$oid = $_GET['oid']; // order id
	require_once('connect.php');
	if(isset($oid)) {
		$q="DELETE FROM order_head where o_id=$oid";
		$r="DELETE FROM order_detail where o_id=$oid";
		$t="DELETE FROM payment where o_id=$oid";
		$q = strtolower($q);
		$r = strtolower($r);
		$t = strtolower($t);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
			}	
			if(!$mysqli->query($r)){
				echo "DELETE failed. Error: ".$mysqli->error ;
			}		
			if(!$mysqli->query($t)){
				echo "DELETE failed. Error: ".$mysqli->error ;
			}
		   $mysqli->close();
		   //redirect
		   header("Location:order.php");
	}
?>
