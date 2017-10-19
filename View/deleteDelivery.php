

<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>Project3</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="index.html"><h5>Ordering</h5></a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="index2.html">Home</a>
				</li>
				<li>
					<a href="features.php">Check Order</a>
				</li>
				<li>
					<a href="news.php">Delivery</a>
				</li>
				<li>
				     <a href="contact.php">Contact Us</a>
				</li>
				<li>	
				     <a href="/new/index.php">Logout</a>
				
				</li>
				
			</ul>
		</div>
	</div>
	<div id="adbox">
		<div class="clearfix">
			<img src="images/box.png" alt="Img" height="280" width="200">

			<div>
<form>
<?php

// php code to Delete data from mysql database 
if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "ola";
    $databaseName = "customer";
    
    // get id to delete
    $id = $_POST['id'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql delete query 
    $query = "DELETE FROM delivery WHERE `DelivertID` = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    mysqli_close($connect);
}

?>