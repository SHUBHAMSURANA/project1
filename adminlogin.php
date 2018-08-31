<?php
include_once("signcon.php");
if(isset($_POST['submit']))
{  
	$namee=$_POST['name'];
    $lastt=$_POST['last'];
	$sqll="select * from admin where user_name='".$namee."'AND password='".$lastt."'";
	echo"shubham";
	$resultt=mysqli_query($db,$sqll);
	$rows=mysqli_num_rows($resultt);
	if($rows==1)
	{
		header('location:admin.php');
	}
}
?>

<html>
<head>
<title>login form</title>
<link rel="stylesheet" type="text/css" href="adminlogin1.css">
<body>
<a href="index.php" class="button1">LOGOUT</a>
<div class="loginbox">
<img src="login1.png" class="avtar">
<h1>LOGIN HERE</h1>
<form method="POST" action=" ">
<p>Admin Name </p>
<input type="text" name="name" placeholder="enter user name">
<p>Password</p>
<input type="password" name="last" placeholder="enter password"><br>
<input type="submit" name="submit" value="login" >
</form>
</div>
</body>
</head>
</html>