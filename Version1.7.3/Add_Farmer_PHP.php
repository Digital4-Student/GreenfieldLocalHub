<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$FaName = $_POST["FaName"];
$FDesc = $_POST["FDesc"];
$FImg = $_POST["FImg"];
$CustomerID = $_SESSION["customerid"];

$stmt = $conn->prepare("SELECT * FROM farmer WHERE CustomerID = ?");
$stmt->bind_param("i", $CustomerID);
$stmt->execute();
$result = $stmt->get_result();

if(mysqli_num_rows($result)>0){
    echo"Already have a profile";
} else {
    // Inserts the data into the table
    $stmt = mysqli_prepare($conn, "INSERT INTO farmer (FarmerName, FDescription, FImg, CustomerID) VALUES (?,?,?,?);" );
    mysqli_stmt_bind_param($stmt, 'sssi', $FaName, $FDesc, $FImg, $CustomerID);

}

if ($stmt->execute()) {
    header("Location: Farmer_Dashboard.php");
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>