<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<?php
$FarmerID = $_GET['FarmerID'];

$conn = new mysqli("localhost", "root", "", "GLH");

$stmt = $conn->prepare("SELECT * FROM farmer WHERE FarmerID = ?");
$stmt->bind_param("i", $FarmerID);
$stmt->execute();

$result = $stmt->get_result();
$Farmer = $result->fetch_assoc();
?>
<div class="container text-center">
<h2><?php echo $Farmer['FarmerName']; ?></h2>

<p><?php echo $Farmer['FDescription']; ?></p>

<img src="<?php echo $Farmer['FImg']; ?>" class="image mx-auto d-block" alt="Image of <?php echo $row['FarmerName']; ?>" >
</div>
</main>



<?php include 'Footer.php'; ?>
</body>