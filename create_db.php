<?php

$servername = "localhost";
$username = "root";
$password = "";

// Step 1: Connect without database (just to MySQL)
$conn = new mysqli($servername, $username, $password);

// Step 2: Check connection
if ($conn->connect_error) {
    die("BRO CONNECTION FAILED : " . $conn->connect_error);
}

// Step 3: Create the database
$sql = "CREATE DATABASE IF NOT EXISTS library";

if ($conn->query($sql) === TRUE) {
    echo " Database 'library' created successfully";
} else {
    echo " Error creating DB: " . $conn->error;
}

$conn->close();
?>
