<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<?php
$ProductID = $_GET['ProductID'];

$conn = new mysqli("localhost", "root", "", "GLH");

$stmt = $conn->prepare("SELECT * FROM product WHERE ProductID = ?");
$stmt->bind_param("i", $ProductID);
$stmt->execute();

$result = $stmt->get_result();
$Product = $result->fetch_assoc();
?>
<div class="container text-center">
    <div class="row">
    <div class="col">
        <img src="<?php echo $Product['PImg']; ?>" class="image mx-auto d-block" alt="Image of <?php echo $row['ProductName']; ?>" >
    </div>
    <div class="col">
    <h2><?php echo $Product['ProductName']; ?></h2>
    <p>Price: £<?php echo $Product['Price']; ?></p>
    <p>Remaining Stock: <?php echo $Product['Stock']; ?></p>
    <p>Description: <br><?php echo $Product['PDescription']; ?></p>


    <h5>Add to cart: </h5>
    <form action="Add_to_cart.php" method="POST">
    <input type="hidden"  name="ProductID" value="<?php echo $Product['ProductID']; ?>">
    <input type="number" name="quantity" value="1" min="1" max="<?php echo (int)$Product['Stock']; ?>">
    <button type="submit">Add</button>
    </form>

    </div>
    </div>

</div>
</main>



<?php include 'Footer.php'; ?>
</body>