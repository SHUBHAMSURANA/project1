<?php
session_start();
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
<link rel ="stylesheet" href="profile2.css" >
</head>
<body>
<a href="index.php" class="button1">LOGOUT</a>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">My Profile</p>

<div class="box">
<ul >
  <li><a class="active" href="user.php">BACK</a></li>
  <li><a href="transaction.php">FUND TRANSFER</a></li>
  <li><a href="#contact">CHEQUE BOOK REQUEST</a></li>
  <li><a href="benificeryadd.php">ADD BENEFICIARY</a></li>
  <li><a href="#about">OPEN FIXED DEPOSIT</a></li>
  <li><a href="#about">LOAN APPLIACTION</a></li>
  <li><a href="#about">CUSTOMER CARE</a></li>
  <li><a href="#about">FEEDBACK</a></li>
</ul>
</div>
<div class="boxy">
<?php
include_once("signcon.php");
echo "<table width=50%; border='1' cellpadding='5'>";
$sql="SELECT * FROM customers where name='".$_SESSION['name']."'";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
echo"<tr>";
echo"<th>First Name</th><td>".$row['name']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Last Name</th><td>".$row['last']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Email</th><td>".$row['email']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Password</th><td>".$row['password']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Account No</th><td>".$row['accountno']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Sex</th><td>".$row['gender']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>D.O.B</th><td>".$row['birth']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>Account Type</th><td>".$row['account']."</td>";
echo"</tr>";	
echo"<tr>";
echo"<th>Mobile no:</th><td>".$row['mobile']."</td>";
echo"</tr>";
echo"<tr>";
echo"<th>ADHAR NO:</th><td>".$row['adhar']."</td>";
echo"</tr>";
echo"</table>";
?>
</div>