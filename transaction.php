<?php
include_once("signcon.php");
session_start();


$account=$_SESSION['account'];
$sqle="SELECT * FROM beneficiary where accountno='".$_SESSION['account']."'";
$resulte=mysqli_query($db,$sqle);
$rowe = mysqli_fetch_array($resulte);
if($rowe['status1']==1)
{
$one=$rowe['benif1'];
}
if($rowe['status2']==1)
{
$two=$rowe['benif2'];
}
if($rowe['status3']==1)
{
$three=$rowe['benif3'];
}

$sql="SELECT * FROM transaction where accountno='".$_SESSION['account']."' order by ID desc LIMIT 1";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$amount2= $row['balance'];
$amount3=$amount2;
if(isset($_POST['pay']))
{
$first=$_SESSION['account'];
$second=$_POST['second'];
$amount=$_POST['amount'];
$remark=$_POST['remark'];
$amount1= $amount;
$net1=$amount2-$amount1;
date_default_timezone_set("Asia/Kolkata");
$datee=date("d-m-Y");
$sqll="SELECT * FROM transaction where accountno='".$second."' order by ID desc LIMIT 1";
$resultt=mysqli_query($db,$sqll);
$roww = mysqli_fetch_array($resultt);
$amount1= $amount;
$amount2= $roww['balance'];
$net2=$amount2+$amount1;
if($amount3>=$amount)	
{
mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$first','DEBIT','$second','$datee','$amount','$net1')");
mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$second','CREDIT','$first','$datee','$amount','$net2')");
}
else
	$msg1="You don't have sufficient amount balance";
}

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
 <script>
function setrand(){
    alert("Your amount have been tranfered successfull!");
    return true;
}
</script>
</head>
<title>WELCOME TO ONLINE BANK</title>
<link rel ="stylesheet" href="profile3.css" >
</head>
<body>
<a href="index.php" class="button1">LOGOUT</a>
<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">TRANSFER FUND TO</p>
<div class="box">
<ul >
  <li><a class="active" href="user.php">BACK</a></li>
  <li><a href="profile.php">My PROFILE</a></li>
  <li><a href="#contact">CHEQUE BOOK REQUEST</a></li>
  <li><a href="benificeryadd.php">ADD BENEFICIARY</a></li>
  <li><a href="#about">OPEN FIXED DEPOSIT</a></li>
  <li><a href="#about">LOAN APPLIACTION</a></li>
  <li><a href="#about">CUSTOMER CARE</a></li>
  <li><a href="#about">FEEDBACK</a></li>
</ul>
</div>
<div class="hello">
<p class="bal" style="color:red;font-size:30px; font-weight: bold; text-align:center;"><?php
if(isset($amount3))
{
echo"Availiable balance: ".$amount3."";
}
?>
</p>
</div>
<div class="container">
<form action=" " method="post" >
<p style="color:black;font-size:20px;">FROM YOUR ACCOUNTS:</p><p> <input type="text" name="first" value="<?php echo "".$_SESSION['account']."-'".$_SESSION['name']."'"; ?>" /></p> 
<p style="color:black;font-size:20px;">TO WHICH PAY ACCOUNTS:</p><p style="color:black;font-size:20px;"> <select name="second" >
  <option value="<?=$one?>">
  <?php 
  if(isset($one))
  {
  echo $one;
  }
  ?>
  </option>
  <option value="<?=$two?>">
  <?php 
  if(isset($two))
  {
  echo $two;
  }
  ?>
  </option>
  <option value="<?=$three?>">
  <?php 
  if(isset($three))
  {
  echo $three;
  }
  ?>
  </option>
   
</select></p>

<p style="color:black;font-size:20px;">AMOUNT(INR)* :</p><p> <input type="text" name="amount" id=""/></p>
<p style="color:black;font-size:20px;">REMARK: </p><p> <input type="text" name="remark" id=""/></p>
<p style="color:black;font-size:15px;"><input type="radio" name="agreement" value="yes"> I agree to the pay the amount under my acknowledgement.<p>
<p><input  style="color:red;font-size:30px; margin-left:35%;font-weight: bold;text-align: center;" type="submit" name="pay" value="PAY"/></p>
</form>
</div>
<p class="bal" style="color:red;font-size:30px; font-weight: bold;text-align: center;"><?php
if(isset($msg1))
{
echo $msg1;
}
?>

