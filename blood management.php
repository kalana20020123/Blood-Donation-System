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


$query = "SELECT * FROM store WHERE bank_id ='$bankID'";
$result = mysqli_query($con, $query);

if (!$result) {
  // Query execution failed, retrieve and handle the error
  $error = mysqli_error($con);
  echo "Query failed: " . $error;
  // You can log the error or perform other actions as needed
} else {
  // Query execution was successful, continue processing the result
}
  ?>

  <!DOCTYPE HTML>
  <html>

  <head>


  
  <script>
  var id = <?php echo json_encode($id); ?> ;
  alert(id);
</script>
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
  
    <center>
      <h1><?php echo $bloodBankName ?> </h1>
      <h2>Blood Stock Management</h2>
      <h3>Current Blood Stocks</h3>
      <h3><?php 
     
      ?></h3>
    </center>
  
    
      <table border="1" class="bldmng" id="idbldmng" align="center">
        <tr>
          <th>Blood Type</th>
          <th>Amount (ml)</th>
          <th>Packets</th>
          <th>Issue (packets)</th>
          <th>Issue count</th>
        </tr>
  
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['packets']; ?></td>
            <td>
              <button type="button" class="m" onclick="updateIssueCount(this, -1)">-1</button>
              <button type="button" class="p" onclick="updateIssueCount(this, 1)">+1</button>
            </td>
            <td>0</td>
            
          </tr>
          <?php
        }
        ?>
  
      </table>
<br>
      <center><button class="issue" id="issueid">Issue Blood</button></center>
      <br>
     <div class="addbld">
    <form  method="post" action="addblood.php">
   
    <input type="hidden" name="BankID" value="<?php echo $_SESSION['BankID']; ?>">
    
    <label class="bldfrm" for="type">Blood Type:</label>
    <input type="text" id="type" name="type" required><br><br>

    <label class="bldfrm" for="amount">Amount:</label>
    <input type="number" id="amount" name="amount"><br><br>

    <label for="packets" class="bldfrm">No of Packets:</label>
    <input class="bldfrm" type="number" id="packets" name="packets" ><br><br>


    <input type="submit" name="create" value="Add New">
    <input type="submit" name="update" value="Update">
    <input type="submit" name="delete" value="Delete">
  </form>
      </div>
      <script src ="js/bloodissue.js"></script>
  
    <br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
    <ul class="menu">
      <li class="menu"><a href="https://www.w3schools.com/">Contact us</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Terms and Conditions</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Cookies</a></li>
      <li class="menu"><a href="https://www.w3schools.com/">Privacy Policy</a></li>
    </ul>
  </body>
  

  </html>

 
