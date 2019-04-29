
<?php
session_start();
        require_once('connect.php');

		$id = $_POST['USER_ID'];
		$fname = $_POST['USER_FName'];
		$lname = $_POST['USER_LName'];
		$gender = $_POST['USER_GenderID'];
		$address = $_POST['USER_Address'];
		$dob = $_POST['USER_DOB'];
		$email = $_POST['USER_Email'];
		$phone = $_POST['USER_PhoneNo'];
		$username = $_POST['USER_Username'];
		$password = ($_POST['USER_Password']);
		echo "";
      
        $q = 'UPDATE `user` SET `USER_FName`="'.$fname.'",`USER_LName`="'.$lname.'",`USER_GenderID`="'.$gender.'",`USER_Address`="'.$address.'",`USER_DOB`="'.$dob.'",`USER_Email`="'.$email.'",`USER_PhoneNo`="'.$phone.'",`USER_Username`="'.$username.'",`USER_Password`="'.$password.'" WHERE USER_ID = '.$id;


		if(!$mysqli->query($q)){
			echo "Update failed: ". $mysqli->error;
			}
		elseif ($_SESSION['v_userrole']==1) {
			header("Location: user.php?userid=".$_SESSION['v_id']."");
			}
		else{
			$_SESSION['userid'] = $username;
			header("Location: home2.php?userid=".$_SESSION['v_id']."");
			}
      ?>