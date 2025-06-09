<?php
//actions taking place in table named "city" in library database

$conn = new mysqli ("localhost", "root", "", "library");

if($conn->connect_error){
    echo "Couldn't connect : " . $conn->connect_error;
}

//making the table
CREATE TABLE IF NOT EXISTS People (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  city VARCHAR(100),
  score INT
);

// INSERT INTO People (name, city, score) VALUES
// ('Aradhana', 'Lucknow', 345),
// ('Swati', 'Gurugram', 243),
// ('Tamanna', 'Goa', 434),
// ('Aditi', 'Bangalore', 876),
// ('Roshini', 'Nainital', 341);

//update Tamanna's city name from Goa to Chennai
$sql = "UPDATE city
        SET city = 'Chennai'
        WHERE name = 'Tamanna'";

echo $conn->query($sql) ? "Updated Successfully" : "Error : " . $conn->connect_error;

echo "<br>";

//deleting row number 2
$sql = "DELETE FROM city
        WHERE id = 2";

echo $conn->query($sql) ? "DELETED row 2" : "Error : " . $conn->connect_error;

$conn->close();

// removes all rowsof the table
// $sql = "TRUNCATE TABLE Students";
// echo ($conn->query($sql)) ? "Table emptied!<br>" : "Error: " . $conn->error;

// echo "<br>";

// DELETE the whote table
// $sql = "DROP TABLE Students";
// echo ($conn->query($sql)) ? "Table dropped!<br>" : "Error: " . $conn->error;

?>