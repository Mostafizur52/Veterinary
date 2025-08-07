<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vetcare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['signin-email'];
$password_input = $_POST['signin-password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  if (password_verify($password_input, $user['password'])) {
    echo "Login successful! Welcome, " . $user['full_name'];
  } else {
    echo "Incorrect password!";
  }
} else {
  echo "No user found with this email!";
}

$conn->close();
?>
