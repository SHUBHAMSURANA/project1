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
<link rel ="stylesheet" href="update1.css" >
</head>
<body>
<a href="admin.php" class="button1">LOGOUT</a>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">DELETE DATABASE</p>
<div class=container>
<ul>
  <li><a href="view.php" class="button">VIEW ACCOUNT</a></li>
  <li><a href="update.php" class="button">UPDATE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="search.php" class="button">SEARCH ACCOUNT</a></li>
</ul>
</div>
<div class="box">
<?php
include_once("signcon.php");
if(isset($_POST['delete']))
{
$DeleteQuery = "DELETE FROM customers WHERE id='$_POST[hidden]'";          
mysqli_query($db,$DeleteQuery);
}
echo "<table border='1' cellpadding='5'>";
echo"<tr>";
echo"<th>ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>PASSWORD</th><th>ACCOUNT NO</th><th>GENDER</th><th>BIRTH</th><th>ACCOUNT TYPE</th><th>MOBILE NO.</th><th>ADHAR NO.</th>";
echo"</tr>";
$sql="SELECT * FROM customers ";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo"<form action=delete.php method=post>";	
echo"<tr>";
echo"<td>"."<input type=text name=id value=".$row['id']." </td>";
echo"<td>"."<input type=text name=name value=".$row['name']." </td>";
echo"<td>"."<input type=text name=last value=".$row['last']." </td>";
echo"<td>"."<input type=text name=email value=".$row['email']." </td>";
echo"<td>"."<input type=text name=password value=".$row['password']." </td>";
echo"<td>"."<input type=text name=accountno value=".$row['accountno']." </td>";
echo"<td>"."<input type=text name=gender value=".$row['gender']." </td>";
echo"<td>"."<input type=text  name=birth value=".$row['birth']." </td>";
echo"<td>"."<input type=text name=account value=".$row['account']." </td>"; 
echo"<td>"."<input type=text name=mobile value=".$row['mobile']." </td>";
echo"<td>"."<input type=text name=adhar value=".$row['adhar']." </td>";
echo"<td>"."<input type=hidden name=hidden value=".$row['id']." </td>"; 
echo"<td>"."<input type=submit name=delete value=delete"." </td>";
echo"</tr>";	
echo"</form>";
 }
?>
</div>
</body>
</html>