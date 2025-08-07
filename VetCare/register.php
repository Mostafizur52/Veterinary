<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vetcare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['register-name'];
$email = $_POST['register-email'];
$password_plain = $_POST['register-password'];

// Password encrypt
$password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

// Check if user exists
$sql_check = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
  echo "User already registered!";
} else {
  $sql = "INSERT INTO users (full_name, email, password)
          VALUES ('$full_name', '$email', '$password_hashed')";
  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $conn->error;
  }
}

$conn->close();
?>
