<?php
include_once("db.php");






$fname=$_POST["firstname"];
$lname=$_POST["lastname"];

$tno=$_POST["telephoneno"];

$district=$_POST["district"];

$message=$_POST["subject"];

$sql="INSERT INTO contactus(contact_id,first_name,last_name,telephon_no,district,message) VALUES ('','$fname','$lname','$tno','$district','$message')";

$check=mysqli_query($con,$sql);

if($check)
{

   
    echo "submitted successfully.";
    mysqli_close($con);
    echo '<script>alert("submitted successfully.");</script>';
    echo '<script>window.location.href = "contactUs.html";</script>';
    exit;
}
else
{

    echo"<script> alert('Error in Insertion !')</script>";
}

//close connection

mysqli_close($con);


?>