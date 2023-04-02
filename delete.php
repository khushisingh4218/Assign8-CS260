<!DOCTYPE html>
<html>
<head>
	<title>Delete Account</title>
</head>
<body>
	<h2>Delete my account</h2>
	<form method="post" action="">

		
    <label for="confirmation">Are you sure you want to delete your account?(Y/N):</label>
		<input type="text"  name="confirmation" required><br><br>

        <label for="id">Identification Number:</label>
		<input type="number" name="id" required><br><br>


		<label for="password">Password:</label>
		<input type="password" name="password" required><br><br>

		<input type="submit" name="submit" value="Delete"><br><br>
      
      
        

  
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

$pwd=$_POST['password'];
$id=$_POST['id'];



$sql_pwd ="select password from user where id='$id'";
$result = $conn->query($sql_pwd);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      if($pwd == $row["password"])
      {
        $sql ="delete from user  where id= '$id'";
        $result=$conn->query($sql);
        if( mysqli_affected_rows($conn) > 0){
            echo 'Account Deleted successfully!'.'<br> <a href="login.php">'.'Go back to home page'.'</a><br><br>';
        
        }
      }
    
    else{
        echo 'Wrong password!<br>';
        
        exit;
    }}}  



// Close database connection
mysqli_close($conn);

?>