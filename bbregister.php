<?php
require_once('config/db.php');

// Retrieve the form data
$address = $_POST['address'];
$phone = $_POST['phone'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the data into the database
$query = "INSERT INTO blood_bank (address, phone, name, email, password)
          VALUES ('$address', '$phone', '$name', '$email', '$password')";
$result = mysqli_query($con, $query);

if ($result) {
  echo "Registration successful!";
} else {
  $error = mysqli_error($con);
  echo "Registration failed: " . $error;
}

header("Location: bb login page.php");
exit(); // Make sure to exit after redirection

// Close the database connection
mysqli_close($con);
?>
