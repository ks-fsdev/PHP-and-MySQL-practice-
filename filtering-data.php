<?php
//using "students" table for this
$conn = new mysqli("localhost", "root", "", "library");

if($conn->connect_error){
    echo "Connection failed : " . $conn->connect_error;
}

//filtering students whose age is greater than 14 and marks are above 85
$sql = "SELECT * FROM students
        WHERE age > 14 AND marks > 85";

$result = $conn->query($sql);

echo "<h3>Students whose age is greater than 14 and marks are above 85 :</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" . $row['name']. "- age : " . $row['age']. " - marks : " . $row['marks'] . "</li>";
}
echo "</ul><hr>";

//filtering students either in class 10th or have marks below 75

$sql = "SELECT name, class, marks FROM students
        WHERE class = '10th' OR marks < 75";

$result = $conn->query($sql);

echo "<h3> Students either in class 10th or have marks below 75 :</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" . $row['name']. "- class : " . $row['class']. " - marks : " . $row['marks'] . "</li>";
}
echo "</ul><hr>";

//filtering everyone except those whose AGE is NOT above 15

$sql = "SELECT name, age FROM students
        WHERE NOT age > 15";

$result = $conn->query($sql);

echo "<h3> Students whose age is NOT more than 15 :</h3> <ul>";

while($row = $result->fetch_assoc()){
    echo "<li>" . $row['name']. " - age : " . $row['age'] . "</li>";
}
echo "</ul><hr>";

//counting total number of rows

$sql = "SELECT count(*) AS total FROM students";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>TOTAL NUMBER OF STUDENTS IS : </h3>" . $row['total'];

echo "<hr>";
//taking out average of all marks

$sql = "SELECT AVG(marks) AS average FROM students";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>THE AVERAGE MARKS OF ALL STUDENTS IS : </h3>" . $row['average'];

echo "<hr>";

//finding max marks

$sql = "SELECT MAX(marks) AS max_marks FROM students";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>MAXIMUM MARKS IS : </h3>".$row['max_marks'];

echo "<hr>";

//finding min marks

$sql = "SELECT MIN(marks) AS min_marks FROM students";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>MINIMUM MARKS IS : </h3>" . $row['min_marks'];

echo "<hr>";

//student with max marks
$sql = "SELECT name, marks FROM students
        WHERE marks = (SELECT MAX(marks) FROM students)";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>THE STUDENT WITH MAXIMUM MARKS IS : </h3>" . $row['name']. " - marks : " . $row['marks'];

echo "<hr>";

//student with min marks
$sql = "SELECT name, marks FROM students
        WHERE marks = (SELECT MIN(marks) FROM students)";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>THE STUDENT WITH MINIMUM MARKS IS : </h3>" . $row['name']. " - marks : " . $row['marks'];

echo "<hr>";

//finding average age of students
$sql = "SELECT avg(age) AS avg_age FROM students";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "<h3>AVERAGE AGE OF STUDENTS IS : </h3>" .$row['avg_age'];

echo "<hr>";

$conn->close();

?>