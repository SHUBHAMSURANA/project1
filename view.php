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
<link rel ="stylesheet" href="view2.css">
</head>
<body>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">DataBase</p>
<div class="header">
  <a href="admin.php" class="button1">LOGOUT</a>
</div>
<div class=container>
<ul>
  <li><a href="update.php" class="button">UPDATE ACCOUNT</a></li>
  <li><a href="delete.php" class="button">DELETE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="search.php" class="button">SEARCH ACCOUNT</a></li>
</ul>
</div>
<div class="box">
<?php
include_once("signcon.php");
echo "<table border='1' cellpadding='5' >";
echo"<tr>";
echo"<th>ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>PASSWORD</th><th>ACCOUNT NO</th><th>GENDER</th><th>BIRTH</th><th>ACCOUNT TYPE</th><th>MOBILE NO.</th><th>ADHAR NO.</th>";
echo"</tr>";
$sql="SELECT * FROM customers order by id ";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['id']."</td>";
echo"<td>".$row['name']."</td>";
echo"<td>".$row['last']."</td>";
echo"<td>".$row['email']."</td>";
echo"<td>".$row['password']."</td>";
echo"<td>".$row['accountno']."</td>";
echo"<td>".$row['gender']."</td>";
echo"<td>".$row['birth']."</td>";
echo"<td>".$row['account']."</td>";
echo"<td>".$row['mobile']."</td>";
echo"<td>".$row['adhar']."</td>";
echo"</tr>";	
 }
 echo"</table>";
?>
</div>
</body>
</html>