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
				<li>
					<a href="index2.html">Home</a>
				</li>
				<li class="active">
					<a href="features.php">Check Orders</a>
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
	<div id="contents">
		<div class="features">
			<h1>List of Orders</h1>
			<p>
			
			</p>
			<div>
				
				<h2>Orders</h2>
				<p>
					<?php
$host    = "localhost";
$user    = "root";
$pass    = "ola";
$db_name = "customer";

//create connection
$connection = mysqli_connect($host, $user, $pass, $db_name);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//get results from database
$result = mysqli_query($connection,"SELECT * FROM placeorder");
$all_property = array();  //declare an array for saving property

//showing property
echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
?>


<form action="orderIndex.html" method="post">

		    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>

</form>		

</p>
				
			</div>
			<div>
				<img src="images/box-of-icons.png" alt="Img">
				
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="www,facebook.com" target="_blank" class="facebook"></a><a href="http:www.twitter.com/" target="_blank" class="twitter"></a><a href="google.com" target="_blank" class="tumbler"></a>
			</div>
			<p>
				© 2017 Group16. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>