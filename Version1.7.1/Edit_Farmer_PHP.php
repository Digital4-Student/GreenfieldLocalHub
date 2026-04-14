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

$FaName = $_POST["FaName"];
$FDesc = $_POST["FDesc"];
$FImg = $_POST["FImg"];
$CustomerID = $_SESSION["customerid"];

$stmt = $conn->prepare("
    UPDATE farmer 
    SET FarmerName = ?, FDescription = ?, FImg = ? 
    WHERE CustomerID = ?
");

$stmt->bind_param("sssi", $FaName, $FDesc, $FImg, $CustomerID);



if ($stmt->execute()) {
    header("Location: Farmer_Dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>