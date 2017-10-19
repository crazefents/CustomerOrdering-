<?php

$Email = $_POST['Email'];
$password = $_POST['password'];

$Email = stripcslashes($Email);
$password = stripcslashes($password);
$Email = mysql_real_escape_string($Email);
$password = mysql_real_escape_string($password);

mysql_connect("localhost","root","ola");
mysql_select_db("customer");

$result = mysql_query("select * from login where Email ='$Email' and password = '$password'")
     or die("Failed to query database ".mysql_error());
	 
$row = mysql_fetch_array($result);
if($row['Email']==$Email && $row['password']==$password){

echo"Login success!!! Welcome " .$row['firstname'];
header('Location: /new/View/index2.html');    
				
}
else{
echo "Failed";


}
?>