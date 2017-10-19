
<?php include 'db.php'; ?>

<?php
// create a variable
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$Email=$_POST['Email'];
$password=$_POST['password'];


 
//Execute the query
 
 
$result=mysqli_query($connect,"INSERT INTO login (firstname,lastname,Email,password)
		        VALUES ('$firstname','$lastname','$Email','$password')");

				
	if(mysqli_affected_rows($connect) > 0){
	echo "<p>User Added</p>";
	header('Location: /new/index.php');   
	
} else {
	echo "User NOT Added<br />";
	echo mysqli_error ($connect);
}
