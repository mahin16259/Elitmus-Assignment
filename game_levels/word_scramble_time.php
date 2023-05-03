<?php
// Start the session and connect to the database
session_start();
include("../db/db_config.php");
// Get the remaining countdown time from the POST data
$remainingTime = $_POST['remaining_time'];
$time2 = 120 - $remainingTime;

// Check if a row exists for this user in the countdown table
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Update the remaining time in the countdown table
  $sql = "UPDATE users SET time2 = '$time2' WHERE email = '$email'";
} else {
  // Insert a new row in the countdown table
  $sql = "INSERT INTO users (email, time2) VALUES ('$email', '$time2')";
}

// Execute the SQL statement and close the database connection
$conn->query($sql);
$conn->close();
?>
