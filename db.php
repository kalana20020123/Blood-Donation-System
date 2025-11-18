<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bds";





$con=new mysqli($servername,$username,$password,$dbname);
//connection
if($con->connect_error)
{

    die("Connection failed:".$con->connect_error);

}


?>