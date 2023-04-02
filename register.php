<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<h2>Register here!</h2>
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

        <label for="cnfpwd">Confirm Password:</label>
		<input type="password" name="cnfpwd" required><br><br>

		<input type="submit" name="submit" value="Register"><br><br>
      
        

        Already have an account? <a href="login.php">Login</a><br><br>

  
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

$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$email=$_POST['email'];
$pwd=$_POST['password'];
$id=$_POST['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   
    $confirm_password = $_POST['cnfpwd'];

    if ($pwd != $confirm_password) {
        echo "Passwords mismatched!<br>";
        exit;
    }
}
    $min_length = 8;
    
    $uppercase_required = true;
    $lowercase_required = true;
    $digits_required = true;
    $special_chars_required = true;
    $special_chars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    // Check password length
    $length = strlen($pwd);
    if ($length < $min_length ) {
        echo "Password should have atleast 8 characters.<br>";
        exit;
    }

    // Check password complexity
    if ($uppercase_required && !preg_match('/[A-Z]/', $pwd)) {
        echo "Password should contain atleast 1 uppercase character.<br>";
        exit;
    }
    if ($lowercase_required && !preg_match('/[a-z]/', $pwd)) {
        echo "Password should contain atleast 1 lowercase character.<br>";
        exit;
    }
    if ($digits_required && !preg_match('/\d/', $pwd)) {
        echo "Password should contain atleast 1 digit.<br>";
        exit;
    }
    if ($special_chars_required && !preg_match('/[' . preg_quote($special_chars, '/') . ']/', $pwd)) {
        echo "Password should contain atleast 1 special character.<br>";
        exit;
    }

  

$sql ="insert into user values ('$id','$first_name','$last_name','$email','$pwd')";

$result=$conn->query($sql);


// Close database connection
mysqli_close($conn);
?>
