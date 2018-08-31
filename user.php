<?php
include_once("signcon.php");
session_start();
$msg=$_SESSION['name'];
$sql2="SELECT * FROM transaction where accountno='".$_SESSION['account']."' order by ID desc ";
$resultt=mysqli_query($db,$sql2);
$avgbal=0;
$avgexp=0;
$i=1;
$sum1=0;
$sum2=0;
while($roww = mysqli_fetch_array($resultt))
{
if($i<6)
{	
$sum1+=$roww['amount'];
$sum2+=$roww['balance'];
$i++;
 }
}
$avgbal=$sum1/5;
$avgexp=$sum2/5;

$sql="SELECT * FROM transaction where accountno='".$_SESSION['account']."' order by ID desc LIMIT 1";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$amount2= $row['balance'];

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
<link rel ="stylesheet" href="user2.css" >
</head>
<body>
<a href="index.php" class="button1">LOGOUT</a>
<p style="color:blue; text-shadow: 3px 2px white;font-size:20px; font-weight: bold;"><?php
$date=date("d-m-Y");
echo $date;
date_default_timezone_set("Asia/Kolkata");
?>
</p>
<p style="color:black; text-shadow: 3px 2px white;font-size:40px; font-weight: bold;text-align: center;"><?php
if(isset($msg))
{
echo "Welocome To Mr./Mrs "."<mark>".$msg."</mark>"."World Of Banking!";
}
?>
</p>

<div class="menu">
<ul style="margin-top:100px; margin-left:40px;" >
  <li><a class="active" href="profile.php">MY PROFILE</a></li>
  <li><a href="transhistory.php">TRANSACTION HISTORY</a></li>
  <li><a href="transaction.php">FUND TRANSFER</a></li>
  <li><a href="#contact">CHEQUE BOOK REQUEST</a></li>
  <li><a href="benificeryadd.php">ADD BENEFICIARY</a></li>
  <li><a href="#about">OPEN FIXED DEPOSIT</a></li>
  <li><a href="#about">LOAN APPLIACTION</a></li>
  <li><a href="#about">CUSTOMER CARE</a></li>
  <li><a href="#about">FEEDBACK</a></li>
</ul>
</div>
<div class="box">
<?PHP
echo "<table width=75%; border='1' cellpadding='10'>";
echo"<th>Average Transcation</th><th>Average Balance Maintain</th><th>CURRENT AVAILABLE BALANCE</th>";
echo"<tr>";
echo"<td>".$avgexp."</td>";
echo"<td>".$avgbal."</td>";
echo"<td>".$amount2."</td>";
echo"</tr>";	
echo"</table>";
?>
</div>
</body>
</html>