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
<link rel ="stylesheet" href="search2.css">
</head>
<body>
<div class="header">
  <a href="admin.php" class="button1">LOGOUT</a>
</div>

<p style="color:black;font-size:45px;text-align:center;text-shadow: 3px 2px red;margin-top:20px;">ADD MONEY</p>


<div class=container>
<ul>
  <li><a href="update.php" class="button">UPDATE ACCOUNT</a></li>
  <li><a href="delete.php" class="button">DELETE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="view.php" class="button">SEE ALL ACCOUNT</a></li>
</ul>
</div>


<div class="box">
<form action=" " method="post">
<p style="color:BLACK;font-size:25px;text-align:center;text-shadow: 3px 2px WHITE;margin-top:20px;">ENTER THE ACCOUNT NO:<input   type="text" name="account" /></p>
<p ><input style="color:red;font-size:25px;font-weight: bold; margin-left:50%;" type="submit" name="search" value="SEARCH"/></p>
</form>
</div>
<?php

include_once("signcon.php");
if(isset($_POST['search']))
{
$account=$_POST['account'];
session_start();
$_SESSION['acc']=$account;
$sql="SELECT * FROM customers WHERE accountno='$account' ";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
echo "<table border='1' cellpadding='5' WIDTH=100% >";
echo"<tr>";
echo"<th>NAME</th><th>ACCOUNT NUMBER</th><th>GENDER</th><th>BIRTH</th><th>ACCOUNT TYPE</th><th>MOBILE NO.</th>";
echo"</tr>";
echo"<tr>";
echo"<td>".$row['name']." ".$row['last']."</td><td>".$row['accountno']."</td><td>".$row['gender']."</td><td>".$row['birth']."</td><td>".$row['account']."</td><td>".$row['mobile']."</td>";
echo"</tr>";
$msg=$row['name'];
 echo"</table>";
}
?>

<?php
echo"<div class='transfer'>";
echo"<form action='searchka.php' method='post'>";
echo"<p style='color:black;font-size:25px;'>DEPOSITE  :";
echo"<input type='text' name='deposite' />";
echo"<input style='color:black;font-size:20px;font-weight: bold;text-align: center;' type='submit' name='add' value='DEPOSITE'/></p><br>";
echo"<p style='color:black;font-size:25px;'>WITHDRAW  :";
echo"<input type='text' name='withdraw' />";
echo"<input style='color:BLACK;font-size:20px;font-weight: bold;text-align: center;' type='submit' name='minus' value='WITHDRAW'/></p><br>";
echo"<p style='color:black;font-size:25px;'>TRANSFER account no :<input type='text' name='actno'/></p>";
echo"<p style='color:black;font-size:25px;'>AMOUNT :<input type='text' name='transfer' />";
echo"<input style='color:black;font-size:20px;font-weight: bold;text-align: center;' type='submit' name='trans' value='TRANSFER'/></p>";
echo"</form>";
echo"</div>";
?>
