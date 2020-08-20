<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>second page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




</head>
<body>
	<div class="container">
<div class="net">
<ul>
	<li class="active"><a href="second.php">Home</a></li>
	<li class="active"><a href="store.php"></i>Store</a></li>
	<li><a href="customer.php"></i>Customer</a></li>
	<li><a href="billItem.php"></i>Bill Detail</a></li>
	<li><a href="logout.php"></i>
Logout</a></li>
</ul>
</div>
	<h1>WELCOME TO BRAHMA STORE</h1>
</div>
</body>
</html>