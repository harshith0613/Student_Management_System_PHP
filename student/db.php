<?php
$host = "localhost";
$dbname = "school_db";
$username = "root";
$password = "";

// Establishing a connection
$conn = mysqli_connect($host, $username, $password, $dbname, 3307);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connection successful!";
?>
