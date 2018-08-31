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
<link rel ="stylesheet" href="beni1.css">
</head>
<body>
<div class="header">
  <a href="admin.php" class="button1">LOGOUT</a>
</div>

<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">BENIFICERY MAINTAINANCE</p>
<div class=container>
<ul>
  <li><a href="update.php" class="button">UPDATE ACCOUNT</a></li>
  <li><a href="delete.php" class="button">DELETE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="search.php" class="button">SEARCH ACCOUNT</a></li>
</ul>
</div>
<div class="boxy">
<?php
include_once("signcon.php");
if(isset($_POST['check']))
 {
	 $account=$_POST['hidden1'];
	
	 $sql="SELECT * FROM customers WHERE accountno='$account' ";
     $result=mysqli_query($db,$sql);
	 if (mysqli_num_rows($result) > 0)
	 {
		 $msg="ACCOUNT IS VALID";
	 }
     else
     {		 
	 $msg="ACCOUNT IS  INVALID";
	 }
 }
 
if(isset($_POST['check1']))
 {
	 $account=$_POST['hidden1'];
	
	 $sql="SELECT * FROM customers WHERE accountno='$account' ";
     $result=mysqli_query($db,$sql);
	 if (mysqli_num_rows($result) > 0)
	 {
		 $msg="ACCOUNT IS VALID";
	 }
     else
     {		 
	 $msg="ACCOUNT IS  INVALID";
	 }
 }
 
 if(isset($_POST['check2']))
 {
	 $account=$_POST['hidden1'];

	 $sql="SELECT * FROM customers WHERE accountno='$account' ";
     $result=mysqli_query($db,$sql);
	 if (mysqli_num_rows($result) > 0)
	 {
		 $msg="ACCOUNT IS  VALID";
	 }
     else
     {		 
	 $msg="ACCOUNT IS  INVALID";
	 }
 }
?>

<p style="color:white;font-size:30px; font-weight: bold;text-align: center;"><?php
if(isset($msg))
{
echo $msg;
}
?>



<?PHP
include_once("signcon.php");
if(isset($_POST['delete']))	
	{
 
	        $t=$_POST['hidden2']-1;
	        $y=0;
			$UpdateQuery ="UPDATE `beneficiary` SET `benif1` = '$y',`status1` = '$y',`count` = '$t' WHERE accountno='$_POST[hidden]' ";
			mysqli_query($db,$UpdateQuery);
			
	}
if(isset($_POST['delete1']))			
		{
			$y=0;
			$t=$_POST['hidden2']-1;
			$UpdateQuery ="UPDATE `beneficiary` SET `benif2` = '$y',`status2` = '$y',`count` = '$t' WHERE accountno='$_POST[hidden]' ";
			mysqli_query($db,$UpdateQuery);
			
		}
if(isset($_POST['delete2']))			
		{
			$y=0;
			$t=$_POST['hidden2']-1;
			$UpdateQuery ="UPDATE `beneficiary` SET `benif3` = '$y',`status3` = '$y',`count` = '$t' WHERE accountno='$_POST[hidden]'";
			mysqli_query($db,$UpdateQuery);
			
		}



if(isset($_POST['update']))	
	{
 
	         
	        $y=1;
			$UpdateQuery ="UPDATE `beneficiary` SET `status1` = '$y' WHERE accountno='$_POST[hidden]' ";
			mysqli_query($db,$UpdateQuery);
			
	}
if(isset($_POST['update1']))			
		{
			$y=1;
			$UpdateQuery ="UPDATE `beneficiary` SET `status2` = '$y' WHERE accountno='$_POST[hidden]' ";
			mysqli_query($db,$UpdateQuery);
			
		}
if(isset($_POST['update2']))			
		{
			$y=1;
			$UpdateQuery ="UPDATE `beneficiary` SET `status3` = '$y' WHERE accountno='$_POST[hidden]'";
			mysqli_query($db,$UpdateQuery);
			
		}

$x="pending";
$sql="SELECT * FROM beneficiary where status1='".$x."'";
$result=mysqli_query($db,$sql);
$sql1="SELECT * FROM beneficiary where status2='".$x."'";
$result1=mysqli_query($db,$sql1);
$sql2="SELECT * FROM beneficiary where status3='".$x."'";
$result2=mysqli_query($db,$sql2);

echo "<table border='1' cellpadding='5'>";
echo"<tr>";
echo"<th>ACCOUNT NO</th><th>BENIFICERY TO</th><th>COUNT</th><th>STATUS</th>";
echo"</tr>";
while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['accountno']."</td>";
echo"<td>".$row['benif1']."</td>";
echo"<td>".$row['count']."</td>";
echo"<form action=beni.php method=post>";
echo"<td>"."<input type=text name=id value=".$row['status1']." </td>";
echo"<td>"."<input type=hidden name=hidden value=".$row['accountno']." </td>";
echo"<td>"."<input type=hidden name=hidden1 value=".$row['benif1']." </td>";
echo"<td>"."<input type=hidden name=hidden2 value=".$row['count']." </td>";
echo"<td>"."<input type=submit name=update value=update"." </td>";
echo"<td>"."<input type=submit name=check value=check"." </td>";
echo"<td>"."<input type=submit name=delete value=delete"." </td>";	
echo"</tr>";
echo"</form>";
 }
 
while($row = mysqli_fetch_array($result1))
{
echo"<tr>";
echo"<td>".$row['accountno']."</td>";
echo"<td>".$row['benif2']."</td>";
echo"<td>".$row['count']."</td>";
echo"<form action=beni.php method=post>";
echo"<td>"."<input type=text name=id1 value=".$row['status2']." </td>";
echo"<td>"."<input type=hidden name=hidden value=".$row['accountno']." </td>"; 
echo"<td>"."<input type=hidden name=hidden1 value=".$row['benif2']." </td>";
echo"<td>"."<input type=hidden name=hidden2 value=".$row['count']." </td>";
echo"<td>"."<input type=submit name=update1 value=update"." </td>";	
echo"<td>"."<input type=submit name=check1 value=check"." </td>";
echo"<td>"."<input type=submit name=delete1 value=delete"." </td>";	
echo"</tr>";
echo"</form>";
 }
 
while($row = mysqli_fetch_array($result2))
{
echo"<tr>";
echo"<td>".$row['accountno']."</td>";
echo"<td>".$row['benif3']."</td>";
echo"<td>".$row['count']."</td>";
echo"<form action=beni.php method=post>";
echo"<td>"."<input type=text name=id2 value=".$row['status3']." </td>";
echo"<td>"."<input type=hidden name=hidden value=".$row['accountno']." </td>";
echo"<td>"."<input type=hidden name=hidden1 value=".$row['benif3']." </td>";
echo"<td>"."<input type=hidden name=hidden2 value=".$row['count']." </td>";
echo"<td>"."<input type=submit name=update2 value=update"." </td>";	
echo"<td>"."<input type=submit name=check2 value=check"." </td>";
echo"<td>"."<input type=submit name=delete2 value=delete"." </td>";	
echo"</tr>";
echo"</form>";
 }

  
?>
</div
