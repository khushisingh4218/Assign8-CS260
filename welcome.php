<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'cse37';
$db_name = 'dblab8';

// Connect to database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
$eid=$_POST['email'];
$pwd=$_POST['password'];
 
$sql_email ="select * from user where email='$eid'";

if(!empty($sql_email))
{$sql ="select password from user where email='$eid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
      if($pwd == $row["password"])
      {
        echo "<h1>Welcome!</h1><br><br>";
        $firstname_query = "select first_name from user where email='$eid'";
        $firstname_result = $conn->query($firstname_query);
        $lastname_query = "select last_name from user where email='$eid'";
        $lastname_result = $conn->query($lastname_query);
        $id_query = "select id from user where email='$eid'";
        $id_result = $conn->query($id_query);
   
        if ($firstname_result->num_rows > 0) {
            while($row = $firstname_result->fetch_assoc()) {
              $firstname = $row["first_name"];
            }
          }
        if ($lastname_result->num_rows > 0) {
            while($row = $lastname_result->fetch_assoc()) {
              $lastname = $row["last_name"];
            }
          }
          if ($id_result->num_rows > 0) {
            while($row = $id_result->fetch_assoc()) {
              $id = $row["id"];
            }
          }
        echo "<h3>Name:</h3>". $firstname." " . $lastname ."<br><br>";
        echo "<h3>Identification Number:</h3>". $id ."<br><br>";
        echo "<h3>Email:</h3>". $eid."<br><br><br>";
        echo '<a href="update.php">'.'Update my details'.'</a><br><br>';
        echo '<a href="delete.php">'.'Delete my account'.'</a><br><br>';
        echo ' <a href="login.php">'.'Log Out'.'</a><br><br>';
      
    }
      else{
        echo "Invalid credentials!";
        
        exit();
    }
    }
  }}
else {
    echo 'Invalid credentials!';
    exit();
}

mysqli_close($conn);

?>