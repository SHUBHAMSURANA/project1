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
<link rel ="stylesheet" href="update3.css" >
</head>
<body>
<a href="admin.php" class="button1">LOGOUT</a>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">UPDATE DATABASE</p>
<div class=container>
<ul>
  <li><a href="view.php" class="button">VIEW ACCOUNT</a></li>
  <li><a href="delete.php" class="button">DELETE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="search.php" class="button">SEARCH ACCOUNT</a></li>
</ul>
</div>

<div class="box">
<form action="" method="post">
<p style="color:black;font-size:25px;text-align:center;text-shadow: 3px 2px red;margin-top:20px;">ENTER THE ACCOUNT NO:<input   type="text" name="account" /></p>
<p ><input style="color:red;font-size:25px;font-weight: bold; margin-left:50%;" type="submit" name="search1" value="SEARCH"/></p>
</form>	
</div>


<?php
include_once("signcon.php");
if(isset($_POST['update1']))
{
	$UpdateQuery ="UPDATE customers SET name='$_POST[name]',last='$_POST[last]',email='$_POST[email]',gender='$_POST[gender]',birth='$_POST[birth]',account='$_POST[account]',mobile='$_POST[mobile]',adhar='$_POST[adhar]' WHERE id='$_POST[hidden]'";
	mysqli_query($db,$UpdateQuery);
}	

if(isset($_POST['delete1']))
{
$DeleteQuery = "DELETE FROM customers WHERE id='$_POST[hidden]'";          
mysqli_query($db,$DeleteQuery);
}



if(isset($_POST['search1']))
{
$account=$_POST['account'];	
echo"<div class='boxy'>";
echo "<table border='1' cellpadding='5'>";
$sql="SELECT * FROM customers where accountno='".$account."'";
$result=mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<th>ACCOUNT NO</th>";
echo"<td>".$account." </td>";	
echo"<form action=update.php method=post>";	
echo"</tr>";
echo"<tr>";
echo"<th>FIRST NAME</th>";
echo"<td>"."<input style='width:80%;' type=text name=name value=".$row['name']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>LAST NAME</th>";
echo"<td>"."<input style='width:80%;' type=text name=last value=".$row['last']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>EMAIL ADDRESS</th>";
echo"<td>"."<input style='width:80%;'  type=text name=email value=".$row['email']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>GENDER</th>";
echo"<td>"."<input style='width:80%;' type=text name=gender value=".$row['gender']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>D.O.B</th>";
echo"<td>"."<input style='width:80%;' type=text  name=birth value=".$row['birth']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>ACCOUNT TYPE</th>";
echo"<td>"."<input style='width:80%;' type=text  name=account value=".$row['account']." </td>";
echo"</tr>";
echo"<tr>";
echo"<th>MOBILE NO.</th>";
echo"<td>"."<input style='width:80%;' type=text name=mobile value=".$row['mobile']." </td>";
echo"</tr>";	
echo"<tr>";
echo"<th>ADHAR NUMBER</th>";
echo"<td>"."<input style='width:80%;'type=text name=adhar value=".$row['adhar']." </td>";
echo"</tr>";	
echo"<td>"."<input type=hidden name=hidden value=".$row['id']." </td>"; 
echo"<td>"."<input style='width:100%; float=center;'type=submit name=update1 value=UPDATE"." </td>";
echo"</form>";
 }
echo"</table>";
echo"</div>";
}
?>

</body>
</html>