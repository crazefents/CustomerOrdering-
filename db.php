
<?php
$connect=mysqli_connect('localhost','root','ola','customer');
 
if(mysqli_connect_errno($connect))
{
		echo 'Failed to connect';
}
 
?>