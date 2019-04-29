<?php
session_start();

if (isset($_POST['u_login']))
{
	$u_user = $_POST['username'];
	$u_pass = ($_POST['password']);
	$q = "SELECT * FROM user ".
	" WHERE USER_Username='".$u_user."' AND USER_Password='".$u_pass."'";
	//echo $q;
	require_once('connect.php');
	if ($res = $mysqli->query($q))
	{
		$row = $res->fetch_array();
		if (
				isset($row['USER_ID']) &&
				isset($row['USER_Username']) 
			)
			{
				var_dump($row);
				$_SESSION['v_username'] = $row['USER_Username'];
				$_SESSION['v_id'] = $row['USER_ID'];
				$_SESSION['v_userrole'] = $row['USERGROUP_ID'];
				
				if (isset($_SESSION['v_userrole']) && $_SESSION['v_userrole'] == '1')
				{
					$_SESSION['userid'] = $u_user;
					header("Location: home2.php?userid=".$_SESSION['v_id']."");
				}
				else if (isset($_SESSION['v_userrole']) && $_SESSION['v_userrole'] == '2')
				{
					$_SESSION['userid'] = $u_user;
					header("Location: home2.php?userid=".$_SESSION['v_id']."");		
				}
			}
			else
			{
				header("Location: login.php");
			
			}
	}
	else
	{
		header("Location: login.php");
	}
}	
?>