<?php
include_once("signcon.php");
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$last=$_POST['last'];
$email=$_POST['email'];
$pass=$_POST['password'];
$mob=$_POST['mobile'];
$adh=$_POST['adhar'];
$gender=$_POST['gender'];
$bday=$_POST['bday'];
$account=$_POST['account'];
$accountno=$_POST['accountno'];
$pass_len=strlen($pass);
$mob_len=strlen($mob);
$adhar_len=strlen($adh);
if(empty($name))
{
	$msg="Please enter the user name";
}
else if(empty($last))
{
	$msg="Please enter the last name";
}
else if(empty($email))
{
	$msg="Please enter the email address";
}
else if(empty($pass))
{
	$msg="please enter the password";
}
else if(empty($mob))
{
	$msg="please enter mobile number";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	$msg="enter THE VALID EMAIL";
}
else if($pass_len<6)
{
	$msg="enter 6 > digits password ";
}
else if($mob_len<10)
{
	$msg="enter proper digit";
}
else if($adh<12)
{
	$msg="enter porper  adhar no";
}
else
{
$encp=md5($pass);
$date=date("d-m-Y");
$a=ucfirst($name);
$b=ucfirst($last);
date_default_timezone_set("Asia/Kolkata");
mysqli_query($db,"insert into customers(name,last,email,password,accountno,gender,birth,account,mobile,adhar)VALUES('$a','$b','$email','$encp','$accountno','$gender','$bday','$account','$mob','$adh')");
$msg="you have successfully created new account. Happy Banking! ";
mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$accountno','BANK DEPOSITE','SELF','$date','0','0')");
mysqli_query($db,"insert into beneficiary (accountno,benif1,status1,benif2,status2,benif3,status3,count)VALUES('$accountno','0','0','0','0','0','0','0')");
echo '<a href="index.php" style="color:YELLOW;font-size:30px; font-weight: bold;margin-left:35%;">Continue</a>';
}
}
?>
<p style="color:red;font-size:30px; font-weight: bold;text-align: center;"><?php
if(isset($msg))
{
echo $msg;
}
?>
</p>
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
  <script>
  function rand(len){
  return Math.floor(Math.random() * Math.pow(10, len));
}

function setRand(){
   document.getElementById('rand').value = rand(9); 
}
</script>
<title>WELCOME TO ONLINE BANK</title>
<link rel ="stylesheet" href="sign.css" >
</head>
<body onload="setRand()">
<a href="index.php" class="button1" >LOGOUT</a>
<div class="form">
<form action=" " method="post">
<p style="color:YELLOW;font-size:30px; font-weight: bold;text-align: center;">REGISTRATION FORM<p>
<p>First Name:<input type="text" name="name" id=""/></p>
<p>Last Name:<input type="text" name="last" id=""/></p>
<p>Email:<br/><input type="text" name="email" id=""/></p>
<p>Password:<br/><input type="password" name="password" id=""/></p>
<p>ACCOUNT NO:<input style="color:black;" type="text" id="rand" name="accountno">
<button onclick="setRand()">GENERATE</button>
<p>Select Gender:</p>
<p><input type="radio" name="gender" value="male" checked> Male<p>
<p><input type="radio" name="gender" value="female"> Female<p>
<p><input type="radio" name="gender" value="other"> Other<br><p> 
<p>Enter Date Of BIRTH</p>
<input style="color:black;" type="date" name="bday">
<p>Account Type:</p>
<p><input type="radio" name="account" value="Saving" checked>Saving<p> <p><input type="radio" name="account" value="Current">Current<p>
<p>Mobile no:<br/><input type="text" name="mobile" id=""/></p>
<p>ADHAR no:<br/><input type="text" name="adhar" id=""/></p>
<p><input  style="color:red;font-size:30px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="submit" value="Submit"/></p>
</form>
</div>
</body>
</html>