<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bds";





$conn=new mysqli($servername,$username,$password,$dbname);
//connection
if($conn->connect_error)
{

    die("Connection failed:".$conn->connect_error);

}


?>