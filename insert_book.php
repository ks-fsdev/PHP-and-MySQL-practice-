<?php

$conn = new mysqli("localhost", "root", "", "library");

if($conn->connect_error){
    die("connection failed:". $conn->connect_error);
}

$sql = "INSERT INTO Books(title, author, genre, price)
VALUES('Harry Potter 1', 'JK Rowling', 'Fantesy', '25.60')";

if($conn->query($sql)===TRUE){
    echo "Book successfully added";
} else {
    echo "error occursed". $conn->error;
}

$conn->close();

?>