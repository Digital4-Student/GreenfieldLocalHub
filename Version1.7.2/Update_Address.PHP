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

$Address = $_POST["address"];
$CustomerID = $_SESSION["customerid"];

$stmt = $conn->prepare("
    UPDATE customer 
    SET Address = ?
    WHERE CustomerID = ?
");

$stmt->bind_param("si", $Address, $CustomerID);



if ($stmt->execute()) {
    header("Location: Settings.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>