<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Password = $_POST["password"];
$CustomerID = $_SESSION["customerid"];

$Hashed_password = password_hash($Password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("
    UPDATE customer 
    SET Password = ? 
    WHERE CustomerID = ?
");

$stmt->bind_param("si", $Hased_Password, $CustomerID);



if ($stmt->execute()) {
    header("Location: Settings.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>