<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$error = '';

// Create connection
$error = '';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Email = $_POST["email"];
$User_password = $_POST["password"];

$query = $conn->prepare("SELECT * FROM customer WHERE email = ?");
$query->bind_param('s', $Email);
$query->execute();

$result = $query->get_result();
$row = $result->fetch_assoc();

if ($row) {
    if (password_verify($User_password, $row['Password'])) {
        $_SESSION["customerid"] = $row['id'];
        $_SESSION["customer"] = $row;

        header("Location: Homepage.php");
        exit;
    } else {
        echo "The password is not valid.";
    }
} else {
    echo "No user exists with that email address.";
}

$query->close();
$conn->close();
?>