<?php
session_start();



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GLH";

$error = '';

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$Role = $_POST["role"];
$ID = $_POST["ID"];

$query = $conn->prepare("UPDATE role SET roles = ? WHERE customerID = ?");
$query->bind_param('si', $Role, $ID);
$query->execute();

if ($query->execute()) {
    echo "Role updated successfully";
} else {
    echo "Error: " . $query->error;
}