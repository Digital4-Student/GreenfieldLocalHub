<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; 

// Checks if the user has the required role to access this page
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'farmer') {
    header("Location: Homepage.php");
    exit;
}
?>

<main class="flex-grow-1 pt-5 pb-5 body" >



<div class="container signbox">
    <br>
    <form action="Edit_Farmer_PHP.php" method="post">
    <div class="mb-3 mt-3">
        <label for="FaName" class="form-label">Farmer/Producer Name:</label>
        <input type="text" class="form-control" id="FaName" Value="<?php echo $_SESSION['customer']['FirstName'] ?> <?php echo $_SESSION['customer']['LastName'] ?>" name="FaName">
    </div>    
    <div class="mb-3">
        <label for="FDesc" class="form-label">Description:</label>
        <textarea type="text" class="form-control" id="FDesc" placeholder="Enter description" name="FDesc"></textarea>
    </div>
    <div class="mb-3">
        <label for="FImg" class="form-label">Your Image:</label>
        <input type="text" class="form-control" id="FImg" placeholder="Enter link to image" name="FImg">
    </div>
    <button type="submit" class="btn btn-success  ">Add profile</button>
    <br><br>
    </form>
</div>

</main>


<?php include 'Footer.php'; ?>

</body>