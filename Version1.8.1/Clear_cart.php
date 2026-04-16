<?php
session_start();

if (!isset($_SESSION["customer"])) {
    header("Location: Sign_in.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "GLH");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$CustomerID = $_SESSION["customer"]["CustomerID"];
$stmt = $conn->prepare("DELETE FROM cart WHERE CustomerID = ?");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();

$conn->commit();

header("Location: Cart_page.php");
exit;