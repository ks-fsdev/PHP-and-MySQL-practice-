<?php
$conn = new mysqli("localhost", "root", "", "library");

if($conn->connect_error){
    echo "Connection failed : " . $conn->connect_error;
}

$sql = "CREATE TABLE IF NOT EXISTS Students(
        roll_no INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        age INT,
        class VARCHAR(20),
        marks INT
)";

$conn->query($sql); // we won't check the result here to keep it simple

// $sql = "INSERT INTO Students (name, age, class, marks)
//         VALUES ('Angela Mathews', 17, '10A', 91)";
// $conn->query($sql); // insert once, then comment this out to avoid duplicates

$sql = "SELECT * FROM Students";

$result = $conn->query($sql); // insert once, then comment this out to avoid duplicates

echo "<h3> TOTAL STUDENTS : " . $result->num_rows . "<h3>";

echo "<ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" .$row['name']. "- Class" .$row['class']. "- marks" . $row['marks'];
}
echo "</ul>";

$conn->close();
?>