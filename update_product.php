
<?php
session_start();
        require_once('connect.php');

		$id = $_POST['P_ID'];
		$name = $_POST['P_Name'];
		$details = $_POST['P_Details'];
		$price = $_POST['P_Price'];
		$company = $_POST['P_Company'];
		echo "";
      
        $q = 'UPDATE `product` SET `P_Name`="'.$name.'",`P_Details`="'.$details.'",`P_Price`="'.$price.'",`P_Company`="'.$company.'" WHERE P_ID = '.$id;


		if(!$mysqli->query($q)){
			echo "Update failed: ". $mysqli->error;
			}
		elseif ($_SESSION['v_userrole']==1) {
			header("Location: product2.php?userid=".$_SESSION['v_id']."");
			}
		else{
			$_SESSION['userid'] = $username;
			header("Location: home2.php?userid=".$_SESSION['v_id']."");
			}
      ?>