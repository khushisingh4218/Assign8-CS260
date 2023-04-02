<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	<form method="post" action="welcome.php">

		
        <label for="email">Email:</label>
		<input type="email" name="email" required><br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br><br>


		<input type="submit" name="submit" value="Login"><br><br>
      
        

        Dont't have an account? <a href="register.php">Register</a><br><br>

  
	</form>
</body>
</html>
<?php
// Database configuration
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


// Close database connection
mysqli_close($conn);
?>
