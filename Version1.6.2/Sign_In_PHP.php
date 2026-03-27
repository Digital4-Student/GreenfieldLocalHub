<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$error = '';

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Email = $_POST["email"];
$User_password = $_POST["password"];

$query = $conn->prepare("
    SELECT customer.*, role.roles 
    FROM customer 
    JOIN role ON customer.CustomerID = role.customerID 
    WHERE customer.email = ?
");
$query->bind_param('s', $Email);
$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();

if ($row) {
    if (password_verify($User_password, $row['Password'])) {
        $_SESSION["customerid"] = $row['CustomerID'];
        $_SESSION["customer"] = $row;
        $_SESSION["role"] = $row['roles'];
        

        header("Location: Homepage.php");
        exit;
    } else {
        echo "The password is not valid.";
    }
} else {
    echo "No user exists with that email address.";
}

$query->close();
$conn->close();
?>