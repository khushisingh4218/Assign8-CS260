<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>
	<h2>Update your details</h2>
	<form method="post" action="">

		
    <label for="id">Identification number:</label>
		<input type="number" step="1" name="id" required><br><br>

		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" required><br><br>
		
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" required><br><br>
		
        <label for="email">Email:</label>
		<input type="email" name="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br><br>

		<input type="submit" name="submit" value="Update"><br><br>
      
      
        

  
	</form>
</body>
</html>

<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'cse37';
$db_name = 'dblab8';

// Connect to database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$email=$_POST['email'];
$pwd=$_POST['password'];
$id=$_POST['id'];

    
  

$sql1 ="update user set first_name='$first_name' where id= '$id'";
$sql2 ="update user set last_name='$last_name' where id= '$id'";
$sql3 ="update user set email='$email' where id= '$id'";
$sql4 ="update user set password='$pwd' where id= '$id'";
  

$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
$result3=$conn->query($sql3);
$result4=$conn->query($sql4);
if( mysqli_affected_rows($conn) > 0){
    echo 'Update successful!<br>';
     echo '<a href="login.php">'.'View my updated details'.'</a><br><br>';
}


// Close database connection
mysqli_close($conn);

?>