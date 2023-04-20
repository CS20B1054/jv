<?php
session_start();
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

// Process the form data and insert the user's information into the database
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username;
  $sql = "INSERT INTO user_details (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
  if (mysqli_query($conn, $sql)) {
    echo "User registered successfully";
    header("Location: loged.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
 ?>
