<?php

$conn = new mysqli("localhost", "root", "", "library");

$sql = "SELECT marks, name
        FROM students
        WHERE marks > (
            SELECT AVG(marks)
            FROM students
            )";

$result = $conn->query($sql);

echo "<h3>Students with marks more than the average:</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>". $row['name'] . "- marks : " . $row['marks'] . "</li>";
}

echo "</ul>";


$conn->close();
?>