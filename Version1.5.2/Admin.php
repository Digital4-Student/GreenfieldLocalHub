<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; 

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    header("Location: Homepage.php");
    exit;
}
?>

<main class="flex-grow-1 pt-5 pb-5 body" >
<div class="container signbox">
    <br>
    <form action="Admin_PHP.php" method="POST">
    <div class="mb-3 mt-3">
        <label for="role" class="form-label">Role:</label>
        <input type="text" class="form-control" id="role" placeholder="Enter role" name="role">
    </div>
    <div class="mb-3">
        <label for="ID" class="form-label">ID:</label>
        <input type="text" class="form-control" id="ID" placeholder="Enter customer ID" name="ID">
    </div>
    <button type="submit" class="btn btn-success  ">Change role</button>
    <br><br>
    </form>
</div>
</main>
<?php include 'Footer.php'; ?>



</body>

