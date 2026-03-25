<?php
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

$FName = $_POST["FName"];
$LName = $_POST["LName"];
$Email = $_POST["email"];
$User_password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM customer WHERE email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if(mysqli_num_rows($result)>0){
    echo"This email is already in use";
} else {
    $Hashed_password = password_hash($User_password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO customer (firstname, lastname, email, password) VALUES (?,?,?,?);" );
    mysqli_stmt_bind_param($stmt, 'ssss', $FName, $LName, $Email, $Hashed_password);

}

if ($stmt->execute()) {
    echo "Successful";
} else {
    echo "Error: " . $stmt->error;
}

$conn->close();


?>