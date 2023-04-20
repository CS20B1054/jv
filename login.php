<?php
// Start a session


// Connect to the database
$db_host = "localhost:3307"; // database host name
$db_user = "root"; // database user name
$db_pass = ""; // database password
$db_name = "jv"; // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Process the form data and check if the user's credentials are valid
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $sql = "SELECT * FROM user_details WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
        echo "login successfull";
      // Set session variables and redirect to home page
    //   $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      header("Location:loged.php");
      exit();
    } else {
      echo "Invalid username or password";
    }
  } else {
    echo "Invalid username or password";
  }
}

// Close the database connection
mysqli_close($conn);
?>
