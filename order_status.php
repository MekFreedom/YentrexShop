<?php
session_start();

        require_once('connect.php');

		$oid = $_REQUEST['o_id'];
		$status = $_POST['status_id'];
      
        $q = 'UPDATE `order_head` SET `status_id`="'.$status.'" WHERE o_id = '.$oid;


		if(!$mysqli->query($q)){
			echo "Update failed: ". $mysqli->error;
			}
		elseif ($_SESSION['v_userrole']==1) {
			header("Location: order_staff.php?userid=".$_SESSION['v_id']."");
			}
		else{
			$_SESSION['userid'] = $username;
			header("Location: home3.php?userid=".$_SESSION['v_id']."");
			}
      ?>