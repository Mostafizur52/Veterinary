<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name    = $_POST['contact-name'] ?? '';
  $email   = $_POST['contact-email'] ?? '';
  $phone   = $_POST['contact-phone'] ?? '';
  $subject = $_POST['contact-subject'] ?? '';
  $message = $_POST['contact-message'] ?? '';

  // Connection info
  $conn = new mysqli("localhost", "root", "", "vetcare");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO contact_messages (name, email, phone, subject, message)
          VALUES (?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

  if ($stmt->execute()) {
    echo "Message sent successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();

} else {
  echo "Invalid request!";
}
?>
