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

// Retrieve the blood group from the form
$bloodGroup = $_POST['bloodGroup'];

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// Retrieve the current packet count from the database
$sqlSelect = "SELECT packets FROM store WHERE bank_id = '$bankID' AND type = '$bloodGroup'";
$resultSelect = $con->query($sqlSelect);

if ($resultSelect->num_rows > 0) {
    $row = $resultSelect->fetch_assoc();
    $currentPackets = $row['packets'];

    
    // Increment the packet count by 1
    $newPackets = $currentPackets + 1;
    
    //amount count
    $amount = $newPackets * 500 ;
    
    // Update the packet count in the database
    $sqlUpdate = "UPDATE store SET packets = $newPackets , quantity = $amount WHERE bank_id = '$bankID' AND type = '$bloodGroup' ";
    
    if ($con->query($sqlUpdate) === TRUE) {
        echo "Packet count updated successfully.";

    } else {
        echo "Error updating packet count: " . $con->error;
    } 


   
} else {
    echo "No record found for the given bank ID and blood group.";
}

echo '<script>window.location.href = "donation.php";</script>';

// Close the connection
$con->close();
?>
