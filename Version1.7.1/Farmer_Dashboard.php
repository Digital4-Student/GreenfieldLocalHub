<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; 

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'farmer') {
    header("Location: Homepage.php");
    exit;
}
?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<div class="text-center" >
    <h1>Welcome <?php echo $_SESSION['customer']['FirstName'] ?> <?php echo $_SESSION['customer']['LastName'] ?></h1>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col signbox">
            <a href="Product_session_create.php" class ="blacklink"><h1>Add product</h1></a>
        </div>
        <div class="col textbox">
            <a href="#" class ="blacklink"><h1>Edit product</h1></a>
        </div>
        <div class="col signbox">
            <a href="Add_Farmer.php" class ="blacklink"><h1>Create profile</h1></a>
        </div>
        <div class="col textbox">
            <a href="Edit_Farmer.php" class ="blacklink"><h1>Edit profile</h1></a>
        </div>
    </div>
</div>

</main>


<?php include 'Footer.php'; ?>

</body>