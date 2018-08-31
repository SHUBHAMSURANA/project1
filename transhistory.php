

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
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">TRANSACTION HISTORY</p>

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
session_start();
echo "<table width=75%; border='1' cellpadding='5'>";
$sql="SELECT * FROM transaction where accountno='".$_SESSION['account']."' order by id desc LIMIT 5";
echo"<th>TRANSACTION TYPE</th><th>TRANSACTION TO</th><th>AMOUNT</th><th>DATE</th><th>BALANCE</th>";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
{	
echo"<tr>";
echo"<td>".$row['transaction_type']."</td>";
echo"<td>".$row['transaction_to']."</td>";
echo"<td>".$row['amount']."</td>";
echo"<td>".$row['date']."</td>";
echo"<td>".$row['balance']."</td>";
echo"</tr>";	
 }
}
echo"</table>";
?>
</div>