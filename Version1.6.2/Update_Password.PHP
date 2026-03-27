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

$FName = $_POST["FName"];
$LName = $_POST["LName"];
$CustomerID = $_SESSION["customerid"];

$stmt = $conn->prepare("
    UPDATE customer 
    SET FirstName = ?, LastName = ? 
    WHERE CustomerID = ?
");

$stmt->bind_param("ssi", $FName, $LName, $CustomerID);



if ($stmt->execute()) {
    header("Location: Settings.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>