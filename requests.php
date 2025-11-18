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


$query = "SELECT * FROM appointment Where bankID='$bankID' ";
$result = mysqli_query($con, $query);  ?>
  

      <!DOCTYPE HTML>
  <html>

  <head>

  <title>Blood Stock Management</title>
  <link rel="stylesheet" type="text/css" href="css/stylesheet1.css">
  
  
  </head>
  
  <body>
  
    <ul class="menu">
      <li class="menu"> <a href="Blood Bank home page.php">Home</a> </li>
      <li class="menu"> <a href="request.html">About</a> </li>
      <li class="menu"> <a href="Donation.php">Donation</a> </li>
      <li class="menu"> <a href="centers.php">View Centers</a> </li>
      <li class="menu"> <a href="blood management.php">Stock Management</a> </li>
      <li class="menu"> <a href="requests.php">Donor Requests</a></li>
    </ul>

    <br><br><br>

     
<?php


$query = "SELECT * FROM appointment Where bankID='$bankID' ";
$result = mysqli_query($con, $query);  ?>

<table border="1" class="bldmng" id="idbldmng" align="center">
      <tr>
          <th>Appointment ID</th>
        <th>Donor Name</th>
        <th>Request Date</th>
      
      </tr>

      <?php 
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['Appointment_ID']; ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Date']; ?></td>
        </tr>
        <?php
      }
      ?>

    </table>

<br><br><br>
<br><br><br>


    <ul class="menu">
      <li class="menu"><a href="https://www.w3schools.com/">Contact us</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Terms and Conditions</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Cookies</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Privacy Policy</a></li>
    </ul>
  </body>
  

  </html>

 
