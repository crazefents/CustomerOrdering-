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


<?php include 'database.php'; ?>
 
<?php
 
// create a variable
$CompanyName=$_POST['CompanyName'];
$UserName=$_POST['UserName'];
$Contact=$_POST['Contact'];
$Email=$_POST['Email'];

///
$StreetNO =$_POST['StreetNO'];
$Streetname =$_POST['Streetname'];
$state =$_POST['state'];
$code =$_POST['code'];
 
 //
$Confirm =$_POST['Confirm'];
$Date =$_POST['Date'];
$ArrivalTime =$_POST['ArrivalTime'];

///
$orderName =$_POST['orderName'];
$Payment =$_POST['Payment'];
$Details =$_POST['Details'];
$Quantity =$_POST['Quantity'];
$Date2 =$_POST['Date2'];
$Time =$_POST['Time'];


 
//Execute the query
 
 
$result=mysqli_query($connect,"INSERT INTO customer (CompanyName,UserName,Contact,Email)
		        VALUES ('$CompanyName','$UserName','$Contact','$Email')");
$result=mysqli_query($connect,"INSERT INTO address (Cus_ID,StreetNO,Streetname,state,code)
		        VALUES (LAST_INSERT_ID(),'$StreetNO','$Streetname','$state','$code')");	   
$result=mysqli_query($connect,"INSERT INTO delivery (Cus_ID,Confirm,Date,ArrivalTime)
		        VALUES (LAST_INSERT_ID(),'$Confirm','$Date','$ArrivalTime')");
$result=mysqli_query($connect,"INSERT INTO placeorder(orderName, Date2, Time, Payment, Quantity, Details, Cus_ID) 
		       VALUES ('$orderName','$Date2','$Time','$Payment','$Quantity','$Details',LAST_INSERT_ID())");
				
	if(mysqli_affected_rows($connect) > 0){
	echo "<p>Order successfully Added</p>";
	//echo "<a href="add.php">Go Back</a>";
} else {
	echo "Order NOT Added<br />";
	echo mysqli_error ($connect);

}
?>

<?php 
if ($_POST["Email"]<>'') { 
    $ToEmail = 'kefentsecrocomathibe@gmail.com'; 
    $EmailSubject = 'Order Confirmation'; 
    $mailheader = "From: ".$_POST["Email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["Email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $MESSAGE_BODY = "Name: ".$_POST["orderName"]."\n"; 
    $MESSAGE_BODY .= "Email: ".$_POST["Email"]."\n"; 
    $MESSAGE_BODY .= "Comment: ".nl2br($_POST["Confirm"])."\n"; 
	$MESSAGE_BODY .= "Date: ".nl2br($_POST["Date"])."\n"; 
	$MESSAGE_BODY .= "Arrival Time: ".nl2br($_POST["ArrivalTime"])."\n"; 
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 
?> 
Email Confirmation message was sent
<?php 
} else { 
?> 

<?php 
}; 
?>



