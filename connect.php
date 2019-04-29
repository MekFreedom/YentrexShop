<?php

$mysqli = new mysqli('localhost','root','','yentrex');

if($mysqli->connect_errno)

{
	
	echo "Connect Fail!";

}
   
?>
