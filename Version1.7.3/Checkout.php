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

$conn->begin_transaction();

try {
    // Get cart items
    $stmt = $conn->prepare("
        SELECT c.ProductID, c.Quantity, p.Price, p.Stock
        FROM cart c
        JOIN product p ON c.ProductID = p.ProductID
        WHERE c.CustomerID = ?
        FOR UPDATE
    ");
    $stmt->bind_param("i", $CustomerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        throw new Exception("Cart is empty.");
    }

    $Total = 0;
    $items = [];

    while ($row = $result->fetch_assoc()) {
        if ($row["Quantity"] > $row["Stock"]) {
            throw new Exception("Not enough stock for one of the items.");
        }

        $lineTotal = $row["Price"] * $row["Quantity"];
        $Total += $lineTotal;
        $items[] = $row;
    }

    // Create order
    $stmt = $conn->prepare("INSERT INTO orders (CustomerID, Total) VALUES (?, ?)");
    $stmt->bind_param("id", $CustomerID, $Total);
    $stmt->execute();
    $OrderID = $conn->insert_id;

    // Save order items and reduce stock
    foreach ($items as $item) {
        $stmt = $conn->prepare("
            INSERT INTO order_items (OrderID, ProductID, Quantity, Price, CustomerID)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "iiidi",
            $OrderID,
            $item["ProductID"],
            $item["Quantity"],
            $item["Price"],
            $CustomerID
        );
        $stmt->execute();

        $newStock = $item["Stock"] - $item["Quantity"];
        $stmt = $conn->prepare("UPDATE product SET Stock = ? WHERE ProductID = ?");
        $stmt->bind_param("ii", $newStock, $item["ProductID"]);
        $stmt->execute();
    }

    // Clear cart
    $stmt = $conn->prepare("DELETE FROM cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $CustomerID);
    $stmt->execute();

    $conn->commit();

    header("Location: Homepage.php");
    exit;

} catch (Exception $e) {
    $conn->rollback();
    die("Checkout failed: " . $e->getMessage());
}