<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("connection failed" . $conn -> connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Books(
book_id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(150),
author VARCHAR(100),
genre VARCHAR(100),
price DECIMAL (6,2)
)";

if($conn->query($sql) === TRUE){
    echo "table 'Books' created successfully";
} else{
    echo "Error creating table" . $conn->error;
}

$conn->close();

?>