<?php
session_start();
?>
<html>
<body>
<?php
if (isset($_SESSION['v_userrole']) && $_SESSION['v_userrole'] == '1')
{
	
}
else if (isset($_SESSION['v_userrole']) && $_SESSION['v_userrole'] == '2')
{
	echo "2222222222222";
	echo "<hr>";
	var_dump($_SESSION);
} 
else if (isset($_SESSION['v_userrole']) && $_SESSION['v_userrole'] == '3')

else
{
	echo "You don't have permission";
}

?>
<hr>
<a href="logout.php">Logout</a>
<hr>

<a href="main.php">Goto main page</a>


</body>
</html>
