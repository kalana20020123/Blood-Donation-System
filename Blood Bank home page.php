<?php
require_once('config/db.php');

session_start(); // Start the session

// Check if the name, email, and bankID are stored in the session
if (isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['BankID'])) {
    $bloodBankName = $_SESSION['name'];
    $email = $_SESSION['email'];
    $bankID = $_SESSION['BankID'];
    
    
   /* echo "Name: " . $bloodBankName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Bank ID: " . $bankID; */
} else {
    // Data not found in the session, handle the case accordingly
    header("Location:bb login page.php");
}
?>


<!DOCTYPE HTML>
<html>

<head>
<title>Blood Bank Page</title>
<link rel="stylesheet" type="text/css" href="../hasintha/css/stylesheet1.css">


</head>


<body>


<ul class="menu">
<li class="menu"><img src="css/logo.jpg" alt="Logo" class="logo" width="50px" height="50px"></li>
	<li class="menu"> <a href="Blood Bank home page.php">Home</a> </li>
	<!--<li class="menu"> <a href="../navidunew/aboutUs.html">About Us</a> </li> -->
	<li class="menu"> <a href="Donation.php">Donation</a> </li>
  <li class="menu"> <a href="centers.php">View Centers</a> </li>
	<li class="menu"> <a href="blood management.php">Stock Management</a> </li>
	<li class="menu"> <a href="requests.php">Donor Requests</a></li>
</ul>
<div align="right"><a href="bb login page.php"><button id="logout">log out</button> </a></div>


<center>  <h1>
  <?php

  // Print the blood bank name
  echo $bloodBankName;
  ?>
</h1></center>
<hr>
<div class="container">


 

  <div class="column" align="center">
  <h2>Check Donor Details and Confirm Donors</h2>
    <a class="button1" id="butid1" href ="donation.php" ><button  > Ongoing Donations </button> </a>    
      <br><br>

<h2>Issue Blood and Manage Blood Stocks</h2>
      <a class="button1" id="butid1" href="blood management.php"><button>Manage Stocks   </button></a>



   
<a class="button1" id="butid1"  href = "https://www.w3schools.com/">
<br><br> 
<h2> Low Blood Stocks ? Request Blood here </h2>
  
   <button > Request Blood</button> </a>
    
  </div>

  <div class="column" align="center">
    <div  class="search">
      <input type="text" placeholder="Search..">
    </div>
    <br>

    <h2> Blood Donation Requests </h2>

<style>
    .data-preview {
      border: 1px solid #ccc;
      padding: 10px;
      max-height: 200px;
      overflow-y: auto;
    }
  </style>
  
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
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          if ($count >= 3) {
            break; // Exit the loop after 3 iterations
          }
          ?>
          <tr>
            <td><?php echo $row['Appointment_ID']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Date']; ?></td>
          </tr>
          <?php
        $count++;}
        ?>
  
      </table>
   
      <br>
 <a href="requests.php"> <button class="button3" id ="upblcmp"> View All Requests</button> <br><br><br><br>
 <a href="donation.php"> <button class="button3" id="ongblcmp"> Ongoing Blood Camps</button><br><br>
  <a href="donation.php"> <button class="button3" id = "dnrmng"> Donor Management</button> <br><br>
  
</div>

</div>
  


 			  


 

<ul class="menu">

<li class="menu"><a href="https://www.w3schools.com/">  Contact us </a> </li>
<li class="menu"><a href="https://www.w3schools.com/">  Terms and Conditions</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Cookies</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Privacy Policy</a> </li> 
<li class="menu"><img src="css/logo.jpg" alt="Logo" class="logo" width="50px" height="50px"></li>

</ul>
</body>



</html>