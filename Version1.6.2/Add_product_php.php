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



$PName = $_POST["PName"];
$Stock = $_POST["Stock"];
$Price = $_POST["Price"];
$PDesc = $_POST["PDesc"];
$PImg = $_POST["PImg"];
$FarmerID = $_SESSION["FarmerID"];


$stmt = $conn->prepare("INSERT INTO product (ProductName, Stock, Price, PDescription, PImg , FarmerID) VALUES (?,?,?,?,?,?);");
$stmt->bind_param('sidssi', $PName, $Stock, $Price, $PDesc, $PImg, $FarmerID);



if ($stmt->execute()) {
    header("Location: Farmer_Dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>