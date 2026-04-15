<?php
session_start();

if (!isset($_SESSION["customerid"])) {
    header("Location: Sign_in.php");
    exit;
}

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

$CustomerID = $_SESSION["customer"]["CustomerID"];
$ProductID = $_POST["ProductID"];
$Quantity = $_POST["quantity"];

if ($Quantity < 1) {
    die("Invalid quantity");
}

$stmt = $conn->prepare("SELECT Stock FROM product WHERE ProductID = ?");
$stmt->bind_param("i", $ProductID);
$stmt->execute();
$result = $stmt->get_result();
$Product = $result->fetch_assoc();

if (!$Product) {
    die("Product not found.");
}

if ($Quantity > $Product["Stock"]) {
    die("Not enough stock available.");
}

$stmt = $conn->prepare("SELECT CartID, Quantity FROM cart WHERE CustomerID = ? AND ProductID = ?");
$stmt->bind_param("ii", $CustomerID, $ProductID);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $newQty = $row["Quantity"] + $Quantity;

    if ($newQty > (int)$Product["Stock"]) {
        die("Not enough stock available.");
    }

    $stmt = $conn->prepare("UPDATE cart SET Quantity = ? WHERE CartID = ?");
    $stmt->bind_param("ii", $newQty, $row["CartID"]);
    $stmt->execute();
} else {
    $stmt = $conn->prepare("INSERT INTO cart (CustomerID, ProductID, Quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $CustomerID, $ProductID, $Quantity);
    $stmt->execute();
}

header("Location: cart_page.php");
exit;