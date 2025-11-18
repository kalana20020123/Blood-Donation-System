<?php
require_once('config/db.php');

session_start(); // Start the session

// Check if the name, email, and bankID are stored in the session
if (isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['BankID'])) {
    $bloodBankName = $_SESSION['name'];
    $email = $_SESSION['email'];
    $bankID = $_SESSION['BankID'];
    
    // Use the variables as needed
   /* echo "Name: " . $bloodBankName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Bank ID: " . $bankID; */
} else {
    // Data not found in the session, handle the case accordingly
    echo "Data not found in the session.";
}

//echo "<script> alert('php file acceced');</script>";

// Retrieve the form data
$bloodTypes = $_POST['bloodType'];
$amounts = $_POST['amount'];
$packetss = $_POST['packets'];

// Update the database based on the form data
for ($i = 0; $i < count($bloodTypes); $i++) {
  $bloodType = mysqli_real_escape_string($con, $bloodTypes[$i]);
  $amount = intval($amounts[$i]);
  $packets = intval($packetss[$i]);

  // Perform the database update query
  $query = "UPDATE store SET quantity = $amount,packets = $packets WHERE type = '$bloodType' AND bank_id = '$bankID'";
  $result = mysqli_query($con, $query);

  // Check if the query was successful
  if (!$result) {
    // Query execution failed, retrieve and handle the error
    $error = mysqli_error($con);
    echo "Query failed: " . $error;
    // You can log the error or perform other actions as needed
  }
}

header("Location: blood management.php");
exit(); // Make sure to exit after redirection

// Close the database connection
mysqli_close($con);
?>
