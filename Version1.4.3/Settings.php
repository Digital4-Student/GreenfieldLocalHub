<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<div class="text-center" >
    <h1>Welcome <?php echo $_SESSION['customer']['FirstName'] ?> <?php echo $_SESSION['customer']['LastName'] ?></h1>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col textbox">
            <h1>Update information</h1>
        </div>
        <div class="col">
        </div>
        <div class="col textbox">
            <h1>View order history</h1>
        </div>
    </div>
</div>

</main>



<?php include 'Footer.php'; ?>
</body>