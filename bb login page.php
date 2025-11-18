
<?php
session_start();
session_destroy();

?>


<!DOCTYPE HTML>
<html>

<head>
<title>Blood Bank Login Page</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet1.css">
<style>/* CSS code for the login form */
    .bblogin {
      width: 300px;
      margin: 0 auto;
    }
    
    .bblogin h2 {
      text-align: center;
      font-size: 24px;
    }
    
    .bblogin input[type="text"],
    .bblogin input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    .bblogin p {
      text-align: center;
    }
    
    .bblogin input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .bblogin input[type="submit"]:hover{
        background-color: darkgreen;
    }
    
    .register button {
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  width:50%
}

.register button:hover {
  background-color: darkblue;
}
 
    </style>

</head>



<body>

  <script>alert("please input correct user credintials");</script>

<ul class="menu">

	<li class="menu"> <a href="../Navindu/homepage.html">Home</a> </li>
	<li class="menu"> <a href="request.html">About</a> </li>
	<li class="menu"> <a href="Donors.html">Donation</a> </li>
	<li class="menu"> <a href="Centers.html">View Centers</a> </li>
	<li class="menu"> <a href="camps.html">View Camps</a> </li>
	<li class="menu"> <a href="donor_map.html"> Donor map</a></li>
</ul>


<h2>Blood Bank Login</h2>
<form action = "login.php" method = "POST" class="bblogin">
  
    <input class="bblogin" type="text" name="email" placeholder="email" required><br><br>
    <input class="bblogin" type="password" name="password" placeholder="Password" required><br><br>

   
    <input type = "submit" value = "Login">
   
  </form>

<br><br>
  <center>    <p><h3> If you do not have an account, please create an account</h3> </p>
    <br>
    <a href = "Blood bank reg.html"  class ="register" ><button>Register</button> </a>
</center>




 
 <br><br><br><br>
 <br><br><br><br>
 <br><br><br><br>
  








 

<ul class="menu">
<li class="menu"><a href="https://www.w3schools.com/">  Contact us </a> </li>
<li class="menu"><a href="https://www.w3schools.com/">  Terms and Conditions</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Cookies</a> </li>
<li class="menu"><a href="https://www.w3schools.com/"> Privacy Policy</a> </li> 
</ul>
</body>



</html>