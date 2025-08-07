<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vetcare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['booking-name'];
$email    = $_POST['booking-email'];
$phone    = $_POST['booking-phone'];
$address  = $_POST['booking-address'];
$service  = $_POST['booking-service'];

$sql = "INSERT INTO appointments (name, email, phone, address, service) 
        VALUES ('$name', '$email', '$phone', '$address', '$service')";

if ($conn->query($sql) === TRUE) {
  echo "Appointment submitted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
