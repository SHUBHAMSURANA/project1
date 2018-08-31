<?php

include_once("signcon.php");
session_start();
echo $_SESSION['acc'];
$acct=$_SESSION['acc'];
date_default_timezone_set("Asia/Kolkata");
$datee=date("d-m-Y"); 
/* user kaa account*/
$sqll="SELECT * FROM transaction where accountno='".$_SESSION['acc']."' order by ID desc LIMIT 1";
$resultt=mysqli_query($db,$sqll);
$roww = mysqli_fetch_array($resultt);
$amount2= $roww['balance'];	
echo"hallooo";	
/* transfer waale kaa*/
$sql="SELECT * FROM transaction where accountno='".$_POST['actno']."' order by ID desc LIMIT 1";
$result=mysqli_query($db,$sql);
$row= mysqli_fetch_array($result);
$amount3= $row['balance'];	


if(isset($_POST['add']))
{
$amount=$_POST['deposite'];
echo $amount;
$net1=$amount+$amount2;
mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$acct','CASH DEPOSITE BRANCH','SELF','$datee','$amount','$net1')");
}

if(isset($_POST['minus']))
 {
	 $amount=$_POST['withdraw'];
	 if($amount<=$amount2)
	 {
		 $net2=$amount2-$amount;
         mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$acct','CASH WITHDRAW BRANCH','SELF','$datee','$amount','$net2')");
		 
	 }
	 else
	 {
		 echo"transaction failed";
	 }
 }
 
 if(isset($_POST['trans']))
 {   
     $lene=$_POST['actno'];
	 $amount=$_POST['transfer'];
	 if($amount2>=$amount)
	 {
		 $first1=$amount2-$amount;
         $second=$amount3+$amount;
		 mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$acct','DEBIT','$lene','$datee','$amount','$first1')");
		 mysqli_query($db,"insert into transaction (accountno,transaction_type,transaction_to,date,amount,balance)VALUES('$lene','CREDIT','$acct','$datee','$amount','$second')");
      }

		 
	 }
session_destroy();
header('location:search1.php');
?>