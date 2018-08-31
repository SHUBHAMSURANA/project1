<?php
include_once("signcon.php");
session_start();
$account=$_SESSION['account'];
$x="pending";
$sql="SELECT * FROM beneficiary where accountno='".$_SESSION['account']."'";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
if(isset($_POST['add']))
{
if(empty($_POST['first']))
{
	$msg="Please enter the user name";
}
else if(empty($_POST['second']))
{
	$msg="Please enter the nick name";
}
else if(empty($_POST['third']))
{
	$msg="Select account type";
}
else if(empty($_POST['forth']))
{
	$msg="please enter the account number";
}
else if(empty($_POST['fifth']))
{
	$msg="please enter the account number";
}
else
{
	if($_POST['forth']==$_POST['fifth'])
	{
		$msg="You have successfully added benificery";

		if($row['benif1']==0)
		{ 
	  
			$count=$row['count']+1;
			$ben=$_POST['fifth'];
			$UpdateQuery ="UPDATE `beneficiary` SET `benif1` = '$ben',`status1` = '$x', `count` = '$count' WHERE accountno='$account' ";
			mysqli_query($db,$UpdateQuery);
		}
		else if($row['benif2']==0)
		{
			$count=$row['count']+1;
			$ben=$_POST['fifth'];
			$UpdateQuery ="UPDATE `beneficiary` SET `benif2` = '$ben', `status2` = '$x',`count` = '$count' WHERE accountno='$account' ";
			mysqli_query($db,$UpdateQuery);
			
		}
		else if($row['benif3']==0)
		{
			$count=$row['count']+1;
			$ben=$_POST['fifth'];
			$UpdateQuery ="UPDATE `beneficiary` SET `benif3` = '$ben', `status3` = '$x',`count` = '$count' WHERE accountno='$account' ";
			mysqli_query($db,$UpdateQuery);
		}
		
	}
	
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
<link rel ="stylesheet" href="profile3.css" >
</head>
<body>
<a href="index.php" class="button1">LOGOUT</a>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">ADD PAYEE</p>

<div class="box">
<ul >
  <li><a class="active" href="user.php">BACK</a></li>
  <li><a href="transaction.php">FUND TRANSFER</a></li>
  <li><a href="#contact">CHEQUE BOOK REQUEST</a></li>
  <li><a href="profile.php">MY PROFILE</a></li>
  <li><a href="#about">OPEN FIXED DEPOSIT</a></li>
  <li><a href="#about">LOAN APPLIACTION</a></li>
  <li><a href="#about">CUSTOMER CARE</a></li>
  <li><a href="#about">FEEDBACK</a></li>
</ul>
</div>
<p style="color:red;font-size:30px; font-weight: bold;text-align: center;"><?php
if(isset($msg))
{
echo $msg;
}
?>
</p>
<div class="container">
<form action=" " method="post" >
<p style="color:black;font-size:20px;">Payee Account Name:<input type="text" name="first" value="" /></p> 
<p style="color:black;font-size:20px;">Payee Nickname*:<input type="text" name="second" id=""/></p>
<p style="color:black;font-size:20px;">Account Type:<p style="color:black;font-size:15px;"><input type="radio" name="third" value="male" checked>SAVING </p> <p style="color:black;font-size:15px;"><input type="radio" name="third" value="female">CURRENT</p>
 </p>
<p style="color:black;font-size:20px;">Payee Account Number<input type="text" name="forth" id=""/></p>
<p style="color:black;font-size:20px;">Confirm Payee Account<input type="text" name="fifth" id=""/></p>
<p><input style="color:red;font-size:30px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="add" value="ADD"/></p>
</form>
</div>

