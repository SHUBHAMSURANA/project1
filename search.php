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
<link rel ="stylesheet" href="search1.css">
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

<form action="time.php" method="post">
<p style="color:black;font-size:25px;text-align:center;text-shadow: 3px 2px red;margin-top:20px;">ENTER THE ACCOUNT NO:<input   type="text" name="account" /></p>
<p ><input style="color:red;font-size:25px;font-weight: bold; margin-left:60%;" type="submit" name="search" value="SEARCH"/></p>
</form>

<div class="transfer">
<form action=" " method="post">
<p style="color:black;font-size:20px;text-shadow: 3px 2px red;margin-top:20px;">DEPOSITE</p>
<input type="text" name="deposite" />
<input style="color:red;font-size:20px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="add" value="DEPOSITE"/>
<p style="color:black;font-size:20px;text-shadow: 3px 2px red;margin-top:20px;">WITHDRAW</p>
<input type="text" name="withdraw" />
<input style="color:red;font-size:20px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="minus" value="WITHDRAW"/>
<p style="color:black;font-size:20px;text-shadow: 3px 2px red;margin-top:20px;">TRANSFER</p>
<input type="text" name="transfer" />
<input style="color:red;font-size:20px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="trans" value="TRANSFER"/>
</form>
</div>


<div class="shubham">	
<?php
include_once("signcon.php");
if(isset($_POST['update1']))
{
	$UpdateQuery ="UPDATE customers SET id='$_POST[id]',name='$_POST[name]',last='$_POST[last]',email='$_POST[email]',password='$_POST[password]',accountno='$_POST[accountno]',gender='$_POST[gender]',birth='$_POST[birth]',account='$_POST[account]',mobile='$_POST[mobile]',adhar='$_POST[adhar]' WHERE id='$_POST[hidden]'";
	mysqli_query($db,$UpdateQuery);
}	

if(isset($_POST['delete1']))
{
$DeleteQuery = "DELETE FROM customers WHERE id='$_POST[hidden]'";          
mysqli_query($db,$DeleteQuery);
}





if(isset($_POST['search']))
{	
$account=$_POST['account'];
/*session_start();
$_SESSION['acc']=$account;*/
echo "<table border='1' cellpadding='5' width='100%'>";
echo"<tr>";
echo"<th>ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>PASSWORD</th><th>ACCOUNT NO</th><th>GENDER</th><th>BIRTH</th><th>ACCOUNT TYPE</th><th>MOBILE NO.</th><th>ADHAR NO.</th>";
echo"</tr>";
$sql="SELECT * FROM customers where accountno='".$account."'";
$result=mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result))
{
echo"<tr>";
echo"<form action=search.php method=post>";	
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
echo"<td>"."<input type=submit name=update1 value=UPDATE"." </td>";
echo"<td>"."<input type=submit name=delete1 value=DELETE"." </td>";	
echo"</form>";
echo"</tr>";
 }

 

 
 /*
 if(isset($_POST['add'])
 {
	 $amount=$_POST['deposite']; 
 }
 
 if(isset($_POST['trans'])
 {
	 $amount=$_POST['transfer'];
	 mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$account','BANK BRANCH','0','$datee','$amount','$net1')");
	 
 }
 */
}
/*if(isset($_POST['add']))
{
	//header('location:time.php');
}*/

?>

</div>
<div class="shubham2">
<?php
if(isset($_POST['search']))
{
$account=$_POST['account'];
$sql1="SELECT * FROM transaction where accountno='".$_POST['account']."' order by ID desc LIMIT 1";	
$result1=mysqli_query($db,$sql1);
$row1 = mysqli_fetch_array($result1);
$amount2= $row1['balance'];
?>
<p class="bal" style="color:red;font-size:30px; font-weight: bold;text-align: center;"><?php
if(isset($_POST['search']))
if(isset($amount2))
{
echo"Availiable balance: ".$amount2."";
}
?>
</p>
<?php
 
}
?>
</div>


<?PHP



?>


