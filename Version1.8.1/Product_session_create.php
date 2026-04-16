<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$error = '';

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

$CustomerID = $_SESSION["customerid"];

$stmt = $conn->prepare("SELECT FarmerID FROM farmer WHERE CustomerID = ?");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$_SESSION["FarmerID"] = $row['FarmerID'];
$FarmerID = $row['FarmerID'];

header("Location: Add_product.php");