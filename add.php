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

<p style="color:black;font-size:45px;text-align: center;text-shadow: 3px 2px red;margin-top:20px;">ADD MONEY</p>


<div class=container>
<ul>
  <li><a href="update.php" class="button">UPDATE ACCOUNT</a></li>
  <li><a href="delete.php" class="button">DELETE ACCOUNT</a></li>
  <li><a href="sign.php" class="button">ADD NEW ACCOUNT</a></li>
  <li><a href="view.php" class="button">SEE ALL ACCOUNT</a></li>
</ul>
</div>

<form method="POST" action=" ">
<p>ACCOUNT NO.: </p>
<input type="text" name="account" placeholder="enter account number">
<input type="text" name="amount" placeholder="enter amount"><br>
<input type="submit" name="submit" value="login" >
</form>
