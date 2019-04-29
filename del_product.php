
<?php

	$id = $_GET['pid']; // product id
	require_once('connect.php');
	if(isset($id)) {
		$q="DELETE FROM product where P_ID=$id";
		$q = strtolower($q);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location:product2.php");
	}
?>
