<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >
<?php
if (!isset($_SESSION["customer"])) {
    header("Location: Sign_in.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "GLH");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$CustomerID = $_SESSION["customer"]["CustomerID"];

$stmt = $conn->prepare("
    SELECT c.CartID AS cartID, c.Quantity, p.ProductID AS productID, p.ProductName, p.Price, p.Stock
    FROM cart c
    JOIN product p ON c.ProductID = p.ProductID
    WHERE c.CustomerID = ?
");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
?>

<h1>Your Cart</h1>

<div class="container text-center">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        
            <div class="col-md-3"><br>
            <div class="signbox mb-4">
<?php                
    $lineTotal = $row["Price"] * $row["Quantity"];
    $total += $lineTotal;
?>
    <div>
        <h3><?php echo htmlspecialchars($row["ProductName"]); ?></h3>
        <p>Price: £<?php echo number_format($row["Price"], 2); ?></p>
        <p>Quantity: <?php echo (int)$row["Quantity"]; ?></p>
        <p>Line total: £<?php echo number_format($lineTotal, 2); ?></p>
    </div>
    </div>
</div>
<?php endwhile; ?>

<h2>Total: £<?php echo number_format($total, 2); ?></h2>



<form action="Clear_cart.php" method="POST">
    <button type="submit">Clear Cart</button>
</form>
<form action="Checkingout.php" method="POST">
    <button type="submit">Checkout</button>
</form>


</main>



<?php include 'Footer.php'; ?>
</body>