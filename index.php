<?php
include_once("signcon.php");
if(isset($_POST['submit']))
{
	$name=$_POST['fname'];
    $last=md5($_POST['lname']);
	$sql="select accountno from customers where name='".$name."'AND password='".$last."'limit 1";
	$result=mysqli_query($db,$sql);
	if(mysqli_num_rows($result)==1 )
	{
		$row = mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['name']=$name;
		$_SESSION['account']=$row["accountno"];
		header('location:user.php');
	}
	 if(isset($_POST['submit']))
	 {
		 $msg="WRONG CREDENTIAL ENTERED";
	 }
		
}
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Affordable and professional web Design">
<meta name="keyword" content="web design">
<meta name="author" content="shubham">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<title>WELCOME TO ONLINE BANK</title>
<link rel ="stylesheet" href="index1.css" >

</head>
<body>
<div class="header">
  <h1>ONLNE BANKING SYSTEM</h1>
</div>

<div class="topnav">
  <a class="active" href="#">HOME</a>
  <a href="features.html">FEATURES</a>
  <a href="contract.html">CONTACT</a>
  <a href="adminlogin.php">ADMIN</a>
  <a href="sign.php" style="float:right">Sign up</a>
</div>

<div class="container-fluid">
	<div class="row">
	<div class="container-fluid col-md-5">
	<div class="row">
	<div class="login"> 
	<p>Secure login</p>
	<form method="POST" action=" ">
	  <label style="color:black;font-size:25px">First Name</label><br>
	  <input type="text" id="fname" name="fname" placeholder="enter user name"><br>
	  <label style="color:black;font-size:25px" >Password</label><br>
	  <input type="password" id="lname" name="lname" placeholder="enter your password"><br><br>
	  <input type="submit" name="submit" value="login">
	  <?php
	  if (isset($msg))
	  {
		  echo"<P>$msg</P>";
	  }
	  ?>
	  <br><a href="#">Lost your password</a><br>
		  <a href="sign.php">Don't have account</a>
	</form>
	</div>
	</div>
	<div class="row">
	<div class="about">
	<p style="font-size:15px;">Our internet banking portal provides personal banking services that gives you complete conytol over all your banking demands online.</p>
	<h1>Features</h1>
	<ul>
	  <li>Registration for online banking</li>
	  <li>Adding Beneficiary account</li>
	  <li>Fund Transfer</li>
	</ul>

	</ol>
	</div>
	</div>
	</div>
	<div class="col-md-7">
	<div class="vidio col-md-8" style="width:90%;">
	<h1>PERSONAL BANKING</h1>
	  <ul>
	  <li>Personal Banking application provides features to adminster and manage non personal account online</li>
	  <li>Phishing is a fraudulent attemp,usually made through email,phone calls,SMS etc seeking your personal and confidentioal information</li>
	</ul>
	  <video width="600" controls>
		<source src="bank.mp4" type="video/mp4">
		<source src="mov_bbb.ogg" type="video/ogg">
		Your browser does not support HTML5 video.
	  </video>
	</div>
</div>
	</div>
</div>

<div class="footer">
<p>Posted by: SHUBHAM SURANA</p>
  <p>Contact information: <a href="mailto:shubhamsurana1300@gmail.com">shubhamsurana1300@gmail.com</a></p>
</div>

</body>
</html>
