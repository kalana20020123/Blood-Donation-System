<?php
require_once('config/db.php');

$query = "SELECT * FROM blood_bank ";
$result = mysqli_query($con, $query);


?>
  

      <!DOCTYPE HTML>
  <html>

  <head>

  <title>Blood Stock Management</title>
  <link rel="stylesheet" type="text/css" href="css/stylesheet1.css">
  
  
  </head>
  
  <body>
  
    <ul class="menu">
      <li class="menu"> <a href="Blood Bank home page.php">Home</a> </li>
      <li class="menu"> <a href="../Navindu/aboutUs.html">About</a> </li>
      <li class="menu"> <a href="Donation.php">Donation</a> </li>
      <li class="menu"> <a href="centers.php">View Centers</a> </li>
      <li class="menu"> <a href="blood management.php">Stock Management</a> </li>
      <li class="menu"> <a href="requests.php">Donor Requests</a></li>
    </ul>

    <br><br><br>

    <table border="1" class="bldmng" id="idbldmng" align="center">
        <tr>
            <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Contact</th>
        
        </tr>
  
        <?php 
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $row['BankID']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>        
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

 
