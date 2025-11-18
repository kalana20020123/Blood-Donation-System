<?php
require_once('config/db.php');

session_start(); // Start the session

// Check if the name, email, and bankID are stored in the session
if (isset($_SESSION['BankID'])) {
    $bankID = $_SESSION['BankID'];
    
    // Use the variables as needed
    /* echo "Name: " . $bloodBankName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Bank ID: " . $bankID; */
} else {
    // Data not found in the session, handle the case accordingly
    echo "Data not found in the session.";
}


$query = "SELECT * FROM store WHERE bank_id ='$bankID'";
$result = mysqli_query($con, $query);

if (!$result) {
    // Query execution failed, retrieve and handle the error
    $error = mysqli_error($con);
    echo "Query failed: " . $error;
    // You can log the error or perform other actions as needed
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['create'])) {
        // Add new blood record to the database
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $packets = $_POST['packets'];
        $bankID = $_POST['BankID'];

        $query = "INSERT INTO store (type, bank_id, quantity, packets) VALUES ('$type', '$bankID', '$amount', '$packets')";

        $result = mysqli_query($con, $query);

        if (!$result) {
            // Query execution failed, handle the error
            $error = mysqli_error($con);
            echo "Query failed: " . $error;
            // You can log the error or perform other actions as needed
        } else {
            // Redirect to the appropriate page after adding
            header("Location: blood management.php");

            exit();
        }
    } elseif (isset($_POST['update'])) {
        // Update existing blood record in the database
        $type = $_POST['type'];
        $amount = $_POST['amount'];
        $packets = $_POST['packets'];
        $bankID = $_POST['BankID'];

        $cAmount = $packets*500;

        $query = "UPDATE store SET quantity = '$cAmount', packets = '$packets' WHERE type = '$type' AND bank_id = '$bankID'";

        $result = mysqli_query($con, $query);

        if (!$result) {
            // Query execution failed, handle the error
            $error = mysqli_error($con);
            echo "Query failed: " . $error;
            // You can log the error or perform other actions as needed
        } else {
            // Redirect to the appropriate page after updating
            header("Location: blood management.php");
            exit();
        }
    } elseif (isset($_POST['delete'])) {
        // Delete existing blood record from the database
        
        echo "<script>('Confirm Delete');</script>";
        $type = $_POST['type'];

        $query = "DELETE FROM store WHERE type = '$type' AND bank_id = '$bankID'";

        $result = mysqli_query($con, $query);

        if (!$result) {
            // Query execution failed, handle the error
            $error = mysqli_error($con);
            echo "Query failed: " . $error;
            // You can log the error or perform other actions as needed
        } else {
            // Redirect to the appropriate page after deleting
            header("Location: blood management.php");
            exit();
        }

        $con->close();
    }
}

/*
elseif (isset($_POST['delete'])) {
    // Confirm before deleting
    echo "<script>
        if (confirm('Are you sure you want to delete this record?')) {
            // Delete existing blood record from the database
            var type = '" . $_POST['type'] . "';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_blood.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Redirect to the appropriate page after deleting
                    window.location.href = 'blood_stock.php';
                }
            };
            xhr.send('type=' + type + '&bankID=" . $bankID . "');
        }
    </script>";
}
*/