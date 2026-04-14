<?php

session_start();

$x = $_SESSION["role"];
if (isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') {
    echo "Welcome $x !";
}