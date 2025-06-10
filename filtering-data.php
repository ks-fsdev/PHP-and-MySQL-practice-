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

//adding new rows to students 
//bigger table is needed to practice GROUP BY and HAVING
// (commented out because I didn't want it to make copies of this everytime i refresh this page)

/*
$sql = "INSERT INTO students (name, age, class, marks) VALUES
('Elena Gilbert', 16, '10th', 88),
('Bonnie Bennett', 17, '10th', 91),
('Damon Salvatore', 18, '12th', 96),
('Caroline Forbes', 16, '11th', 78),
('Stefan Salvatore', 17, '12th', 96),
('Klaus Mikaelson', 18, '11th', 60),
('Rebekah Mikaelson', 17, '9th', 72),
('Kai Parker', 17, '8th', 90),
('Alaric Saltzman', 18, '11th', 65),
('Peter Parker', 15, '9th', 93),
('Tony Stark', 18, '12th', 99),
('Steve Rogers', 17, '11th', 85),
('Natasha Romanoff', 17, '11th', 92),
('Wanda Maximoff', 16, '10th', 87),
('Vision', 16, '10th', 89),
('Bucky Barnes', 17, '12th', 77),
('Sam Wilson', 16, '10th', 81),
('Loki Laufeyson', 17, '11th', 79),
('Stephen Strange', 18, '12th', 94),
('Shuri', 15, '9th', 90);
";

$conn->query($sql); */

//Showing total marks per class using GROUP BY.

$sql = "SELECT class, SUM(marks) AS avg_marks
        FROM students
        GROUP BY class";

$result = $conn->query($sql);

echo "<h3>Total marks per class :</h3> <ul>";

while($row = $result->fetch_assoc()){
        echo "<li> Class : " .$row['class'] . "- Total marks : " . $row['avg_marks'] . "</li>";
};

echo "</ul><hr>";

//Showing number of students in each class.

$sql = "SELECT class, COUNT(class) AS num_students
        FROM students
        GROUP BY class";

$result = $conn->query($sql);
echo "<h3>Number of students in each class: </h3> <ul>";
while($row = $result->fetch_assoc()){
        echo "<li> class " .$row['class']. " has " . $row ['num_students'] . "students </li>" ;
}

echo "</ul> <hr>";


//Showing only classes with more than 3 student using HAVING.
$sql = "SELECT class, COUNT(class) AS num_students
        FROM students
        GROUP BY class
        HAVING num_students > 3";

$result = $conn->query($sql);

echo "<h3>Classes with more than 3 students: </h3> <ul>";

while($row = $result->fetch_assoc()){
        echo "<li>" . $row['class'] . " class has " . $row['num_students'] . " students</li>";
}
echo "</ul> <hr>";



//Find the class with maximum average marks.
$sql = "SELECT class, AVG(marks) AS avg_marks
        FROM students
        GROUP BY class
        LIMIT 1";

$result = $conn->query($sql);

echo "<h3>Class with max avg marks: </h3>";

while($row = $result->fetch_assoc()){
        echo  $row['class'] . " class has maximum students i.e." . $row['avg_marks'];
}


$conn->close();

?>