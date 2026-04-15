<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Dumps everything in the farmer table, to show each individual farmer that sells products
$stmt = $conn->prepare("SELECT * FROM farmer");
$stmt->execute();

$result = $stmt->get_result();
?>
<div class="container text-center">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        
            <div class="col-md-3"><br>
            <div class="signbox mb-4">
            
            
          
                <h3><?php echo $row['FarmerName']; ?></h3>
                <img src="<?php echo $row['FImg']; ?>" class="image mx-auto d-block" alt="Image of <?php echo $row['FarmerName']; ?>" >
                <p><?php echo $row['FDescription']; ?></p>

                <a href="Farmers_profile.php?FarmerID=<?php echo $row['FarmerID']; ?>">
                    View Profile
                </a>
              
            </div>
            </div>

    <br>

<?php endwhile; ?>
</div>
    </div>
</main>



<?php include 'Footer.php'; ?>
</body>