<?php

$conn = new mysqli("localhost", "root", "", "library");

if($conn->connect_error){
    die ("CONNECTION ERROR : " .$conn->connect_error);
}

//list all students older thatn 14:
$sql = "SELECT * FROM Students WHERE age > 14";

$result = $conn->query($sql);

echo "<h3>Students above 14 years old : </h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li> name - " . $row['name'] . " Age - " .$row['age']. "</li>";
}

echo "</ul>";

//show all students name and class:
$sql = "SELECT name,class FROM Students";

$result = $conn->query($sql);

echo "<h3>The name and age of students are: </h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" .$row['name']. "     -     " . $row['class']. "</li>";
};

echo "</ul>";


//displaying students with marks less than 90:

$sql = "SELECT name, marks FROM Students WHERE marks < 90";

$result = $conn->query($sql);

echo "<h3>Students with marks less than 90 are :</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>". $row['name'] . "     -     ". $row['marks'] . "</li>";
};

echo "</ul>";

//sorting students by age in ascending order

$sql = "SELECT name, age FROM Students ORDER BY age ASC";

$result = $conn->query($sql);

echo "<h3>Students arranged in ascending order of their age :</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" . $row['name']. " - " . $row['age']. "</li>";
}

echo "</ul>";

$conn->close();
?>