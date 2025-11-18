
<?php
//php session for retrieve bloodbank details 

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

?>



<!DOCTYPE HTML>
<html>

<head>
<title>Donation</title>

<link rel="stylesheet" type="text/css" href="css/stylesheet1.css">

<style>

.phpddtable {
  border-collapse: collapse;
  width: 75%;
  border: 1px solid black;
}

.phpddtable th,
.phpddtable td {
  padding: 8px;
  text-align: left;
  border: 1px solid black;
}

.phpddtable th {
  background-color: #9c9ca6;
}

.phpddtable td {
  background-color: #e1ebe9;
}

.phpddtable tr:hover {
  background-color: #c9abab;
}

.searchf {
  margin-bottom: 20px;
}

.searchf input[type="text"] {
  width: 200px;
  height: 45px;
  padding: 5px;
  border: 2px solid #4CAF50;
  border-radius: 4px;
}

.searchf input[type="submit"] {
  padding: 5px 10px;
  height: 57px;
  width: 70px;

  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.searchf input[type="submit"]:hover {
  background-color: #45a049;
}

    </style>
</head>


<body>



<ul class="menu">

	<li class="menu"> <a href="Blood bank home page.php">Home</a> </li>
	<li class="menu"> <a href="request.html">About</a> </li>
	<li class="menu"> <a href="Donation.php">Donation</a> </li>
	<li class="menu"> <a href="Centers.php">View Centers</a> </li>
	<li class="menu"> <a href="blood management.php">Stock Management</a> </li>
	<li class="menu"> <a href="requests.php">Donor Requests</a></li>
</ul>


<center> <h1><?php echo $bloodBankName ?> </h1> 

<h2>Blood Donation and Donor Registration</h2> </center>
<br>

<center>
<p><h3> Enter the Donor ID / NIC in the search bar for find donor Details </h3></p>

<form class="searchf"  class="search" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <input type="text" name="donorId" id="donorId" placeholder="Donor ID / NIC">
  <input  type="submit" name="search" value="search">
</form>
<br>
<p><h3> If the donor not registered to the system, Add new donor </h3></p>

 <a class="button1" id="butid1"  href ="../Ranuga/reg.html" ><button > Add New Donor </button> </a>


<br><br>
</center>



  
<br><br>
<center>

<?php
require_once('config/db.php');


// Retrieve the donor ID from the form
If($_SERVER['REQUEST_METHOD'] === 'POST'){
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
    echo " <table class=\"phpddtable\"> ";
    echo "<tr><th>Name</th><td>" . $donorData['name'] . "</td></tr>";
    echo "<tr><th>Blood Type</th><td>" . $donorData['Blood_grp'] . "</td></tr>";
    echo "<tr><th>Donor ID</th><td>" . $donorData['userID'] . "</td></tr>";
    echo "<tr><th>National ID</th><td>" . $donorData['NIC'] . "</td></tr>";
    echo "<tr><th>Date of birth</th><td>" . $donorData['dob'] . "</td></tr>";
    echo "<tr><th>Gender</th><td>" . $donorData['gender'] . "</td></tr>";
    echo "<tr><th>Address</th><td>" . $donorData['address'] . "</td></tr>";
    echo "<tr><th>Contact</th><td>" . $donorData['mobileNo'] . "</td></tr>";


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

}

?>
</center>

<br><br>
<center>
<p><h3> Please check Eligibility form of the donor and Confirm Donation after the successful donation </h3></p>

<div class="button1" id="getblood" data-blood-group="<?php echo $donorData['Blood_grp']; ?>">
  <button id="addblood" >Confirm Donation</button>
</div>

</center>


 <br><br><br><br>

<ul class="menu">
<li class="menu"><a href="https://www.w3schools.com/">  Contact us </a> </li>
<li class="menu"><a href="https://www.w3schools.com/">  Terms and Conditions</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Cookies</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Privacy Policy</a> </li> 
</ul>
<script src="js/donatebutton.js">
</script>
</body>



</html>