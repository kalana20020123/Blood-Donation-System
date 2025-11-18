<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('config/db.php');

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM blood_bank WHERE email = '$email' AND Password = '$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $bloodBankName = $row['name'];
        $id = $row['BankID'];

        // Save the email,name and bankID in the session variables
        $_SESSION['email'] = $email;
        $_SESSION['BankID'] = $id;
        $_SESSION['name'] = $bloodBankName;

    // Debug statements
echo "Email: " . $email . "<br>";
echo "Name: " . $bloodBankName . "<br>";
echo "Bank ID: " . $id . "<br>";

        header("Location: Blood bank home page.php" );
        exit();
    } else {
        header("Location: bb login page.php");
        exit();
    }

    $con->close();
}
?>
