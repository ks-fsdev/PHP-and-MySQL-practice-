<?php
$conn = new mysqli("localhost", "root", "", "library");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$queryType = $_GET['filter'] ?? '';

switch ($queryType) {
    case 'older_than_14':
        $sql = "SELECT * FROM Students WHERE age > 14";
        break;

    case 'names_and_class':
        $sql = "SELECT name, class FROM Students";
        break;

    case 'marks_below_90':
        $sql = "SELECT * FROM Students WHERE marks < 90";
        break;

    case 'sort_by_age':
        $sql = "SELECT * FROM Students ORDER BY age ASC";
        break;

    default:
        $sql = "SELECT * FROM Students";
}

$result = $conn->query($sql);

echo "<h3>Results:</h3><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>";
    foreach ($row as $key => $value) {
        echo "$key: $value &nbsp;&nbsp;";
    }
    echo "</li>";
}
echo "</ul>";

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Filter</title>
</head>
<body>
    <h2>Select a Query:</h2>

    <form action="" method="GET">
        <button type="submit" name="filter" value="older_than_14">👵 Students Older Than 14</button>
        <button type="submit" name="filter" value="names_and_class">📚 Names and Class Only</button>
        <button type="submit" name="filter" value="marks_below_90">📉 Marks Less Than 90</button>
        <button type="submit" name="filter" value="sort_by_age">📊 Sort by Age (ASC)</button>
    </form>
</body>
</html>