<?php
require_once('config/db.php');


// Retrieve the donor ID from the form
$donorId = $_POST['donorId'];

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform a database query to fetch the donor data based on the donor ID
$sql = "SELECT * FROM users WHERE userID = '$donorId' or NIC = '$donorId'";
    $result = $con->query($sql);
   
    if ($result->num_rows > 0) {


        $donorData = $result->fetch_assoc();
     //   $bloodBankName = $row['name'];
      //  $id = $row['BankID'];
          // Display the donor data
    echo "<h3>Donor Details | Donor ID :" . $donorData['userID']. " </h3>";
    echo "<table>";
    echo "<tr><th>Name</th><td>" . $donorData['name'] . "</td></tr>";
    echo "<tr><th>Donor ID</th><td>" . $donorData['userID'] . "</td></tr>";
    echo "<tr><th>National ID</th><td>" . $donorData['NIC'] . "</td></tr>";
    echo "<tr><th>Date of birth</th><td>" . $donorData['dob'] . "</td></tr>";
    echo "<tr><th>Gender</th><td>" . $donorData['gender'] . "</td></tr>";

    $dateOfBirth = $donorData['dob'];

    // Calculate the donor's age
    $currentDate = date('Y-m-d');
    $age = date_diff(date_create($dateOfBirth), date_create($currentDate))->y;
    
    // Display the donor's age inside the table
    echo '<tr>
            <th>Age</th>
            <td>'.$age.'</td>
          </tr>';




    // Add more rows for other donor data as needed
    echo "</table>";
} else {
    // Donor not found
    echo "Donor not found.";
}

// Close the statement and connection



?>