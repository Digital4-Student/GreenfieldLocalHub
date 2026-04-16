<body class="d-flex flex-column min-vh-100 ">
<?php include 'Navbar.php'; ?>

<main class="flex-grow-1 pt-5 pb-5 body" >

<!--Welcomes the specific user-->
<div class="text-center" >
    <h1>Welcome <?php echo $_SESSION['customer']['FirstName'] ?> <?php echo $_SESSION['customer']['LastName'] ?></h1>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$CustomerID = $_SESSION["customer"]["CustomerID"];
$stmt = $conn->prepare("SELECT * FROM order_items WHERE CustomerID = ?");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();

$result = $stmt->get_result();
?>


<div class="container text-center">
    <div class="row">
        <div class="col signbox">
            <h1>Update information</h1>

            <form action="Update_Name.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="FName" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="FName" placeholder="Enter first name" name="FName">
                </div>
                <div class="mb-3 mt-3">
                    <label for="LName" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="LName" placeholder="Enter last name" name="LName">
                </div>   
            <button type="submit" class="btn btn-success  ">Update names</button>
            </form>
            
            <form action="Update_Email.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            <button type="submit" class="btn btn-success  ">Update email</button>
            </form>

            <form action="Update_Password.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
            <button type="submit" class="btn btn-success  ">Update password</button>
            </form>

            <form action="Update_Phonenumber.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="phonenumber" class="form-label">Phone number:</label>
                    <input type="int" class="form-control" id="phonenumber" placeholder="Enter phone number" name="phonenumber">
                </div>
            <button type="submit" class="btn btn-success  ">Update phone number</button>
    
            </form>

            <form action="Update_Address.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                </div>
            <button type="submit" class="btn btn-success  ">Update address</button>
    
            </form>

        </div>
        <div class="col">
        </div>
        <div class="col textbox">
            <h1>View order history</h1>


<div class="container text-center">
    <div class="row">
        <?php while ($row = $result->fetch_assoc()): ?>
        
            <div class="col-md-3"><br>
            <div class="signbox mb-4">
            
            
          
                <h3><?php echo $row['ProductID']; ?></h3>
                <p><?php echo $row['Quantity']; ?></p>

                
              
            </div>
            </div>

    <br>

<?php endwhile; ?>
</div>
    </div>

        </div>
    </div>
</div>

</main>


<?php include 'Footer.php'; ?>
</body>