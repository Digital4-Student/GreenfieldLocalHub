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



// Creates an array of all the avaiable categories and puts each item that has said category with it on the page
$categories = ['beef','poultry','pork','lamb','fruit','vegetables','fungi','fish','other'];

foreach ($categories as $cat) {

    echo "<div class='container text-center'> <h2>" . ucfirst($cat) . "</h2></div><br>";

    $stmt = $conn->prepare("SELECT * FROM product WHERE Category = ?");
    $stmt->bind_param("s", $cat);
    $stmt->execute();

    $result = $stmt->get_result();
?>

<div class="container text-center">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        
            <div class="col-md-3"><br>
            <div class="signbox mb-4">
            
            
          
                <h3><?php echo $row['ProductName']; ?></h3>
                <img src="<?php echo $row['PImg']; ?>" class="image mx-auto d-block" alt="Image of <?php echo $row['ProductName']; ?>" >
                <p>Price: £<?php echo $row['Price']; ?></p>
                <p>Remaining Stock: <?php echo $row['Stock']; ?></p>
                <p><?php echo $row['PDescription']; ?></p>

                <a href="Product_profile.php?ProductID=<?php echo $row['ProductID']; ?>">
                    View Profile
                </a>
              
            </div>
            </div>

    <br>

<?php endwhile; ?>
</div>
    </div>
    <?php } ?>
</main>




<?php include 'Footer.php'; ?>
</body>