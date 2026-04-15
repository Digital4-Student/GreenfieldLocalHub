<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; 

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'farmer') {
    header("Location: Homepage.php");
    exit;
}
?>

<main class="flex-grow-1 pt-5 pb-5 body" >



<div class="container signbox">
    <br>
    <form action="Add_product_PHP.php" method="post">
    <div class="mb-3 mt-3">
        <label for="PName" class="form-label">Product Name:</label>
        <input type="text" class="form-control" id="PName" placeholder="Enter product name" name="PName">
    </div>   
    <div class="mb-3 mt-3">
        <label for="Stock" class="form-label">Stock:</label>
        <input type="int" class="form-control" id="Stock" placeholder="Enter stock" name="Stock">
    </div>
    <div class="mb-3">
        <label for="Price" class="form-label">Price:</label>
        <input type="int" class="form-control" id="Price" placeholder="Enter price" name="Price">
    </div>
    <div class="mb-3">
        <label for="PImg" class="form-label">Product Image:</label>
        <input type="text" class="form-control" id="PImg" placeholder="Enter link to image" name="PImg">
    </div>
    <div class="mb-3">
        <label for="PDesc" class="form-label">Description:</label>
        <textarea type="text" class="form-control" id="PDesc" placeholder="Enter description" name="PDesc"></textarea>
    </div>
    <div class="mb-3">
       <select name="Category" class="form-control">
            <option value="beef">Beef</option>
            <option value="poultry">Poultry</option>
            <option value="pork">Pork</option>
            <option value="lamb">Lamb</option>
            <option value="fruit">Fruit</option>
            <option value="vegetables">Vegetables</option>
            <option value="fungi">Fungi</option>
            <option value="fish">Fish</option>
            <option value="other">Other</option>
        </select> 
    </div>
    <button type="submit" class="btn btn-success  ">Add product</button>
    <br><br>
    </form>
</div>

</main>


<?php include 'Footer.php'; ?>

</body>