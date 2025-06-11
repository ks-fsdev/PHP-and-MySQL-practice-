<?php
/*
CREATE TABLE Movies (
    movie_id INT PRIMARY KEY,
    title VARCHAR(255),
    release_year INT,
    genre VARCHAR(255)
);

CREATE TABLE Actors (
    actor_id INT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255)
);

CREATE TABLE MovieActors (
    movie_id INT,
    actor_id INT,
    role VARCHAR(255),
    FOREIGN KEY (movie_id) REFERENCES Movies(movie_id),
    FOREIGN KEY (actor_id) REFERENCES Actors(actor_id)
);
*/

$conn = new mysqli("localhost", "root", "", "library");

if($conn->connect_error){
    echo "Connection Error : " .$conn->connect_error;
}

$sql = "CREATE TABLE IF NOT EXISTS movies (
        movie_id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(225),
        release_year INT,
        genre VARCHAR(225))";

    $conn->query($sql);
/*
    $sql = "INSERT INTO movies (title, release_year, genre)
            VALUES ('Due Date', 2010, 'Comedy'),
                    ('The 400 Blows', 1959, 'Crime'),
                    ('Casablanca', 1943, 'Drama'),
                    ('Bottomline', 2002, 'Rom-com'),
                    ('Race To The End', 2015, 'Action')";

    $conn->query($sql);
*/

$sql = "CREATE TABLE IF NOT EXISTS actors (
    actor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255)
)";

$conn->query($sql);

// $sql = "INSERT INTO actors (first_name, last_name)
//         VALUES ('Robert', 'Downey'),
//         ('Chris', 'Hemsworth'),
//         ('Tom', 'Hiddlestone'),
//         ('Chris', 'Evans'),
//         ('Scarlet', 'Johanson')";

//     $conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS movie_actors(
        movie_id INT,
        actor_id INT,
        role VARCHAR(255),
        FOREIGN KEY (movie_id) REFERENCES Movies(movie_id),
        FOREIGN KEY (actor_id) REFERENCES Actors(actor_id)
        )";

$conn->query($sql);

// $sql = "INSERT INTO movie_actors (movie_id, actor_id, role)
//         VALUES 
//         (1, 1, 'Lead'),
//         (1, 2, 'Supporting'),
//         (2, 3, 'Villain'),
//         (3, 4, 'Cameo'),
//         (4, 5, 'Lead Actress')";
        
$conn->query($sql);

//inner join - Show all actors who have worked in at least one movie:

$sql = "SELECT a.first_name, a.last_name, m.title
        FROM movie_actors ma
        INNER JOIN actors a ON ma.actor_id = a.actor_id
        INNER JOIN movies m ON ma.movie_id = m.movie_id";

$result = $conn->query($sql);

echo "<h3>ACTORS AND MOVIE IN WHICH THEY'VE WORKED IN : </h3> <table border='1'>";
echo "<tr><th>Actor Name</th><th>Movie Title</th></tr>";

while($row = $result->fetch_assoc()){
    echo "<tr> 
            <td>" . $row['first_name']." " . $row['last_name'] . " </td> 
            <td>" . $row['title']. "</td>
    </tr>";
}
echo "</table>";

//left join - Show all roles assigned, along with actor names (even if actor missing).
$sql = "SELECT a.first_name, a.last_name, ma.role
        FROM movie_actors ma
        RIGHT JOIN actors a ON ma.actor_id = a.actor_id";

$result = $conn->query($sql);

echo "<h3>ACTORS AND THEIR ROLES : </h3> <table border='1'>";
echo "<tr><th>Actor Name</th><th>Role</th></tr>";

while($row = $result->fetch_assoc()){
    echo "<tr> 
            <td>" . $row['first_name']." " . $row['last_name'] . " </td> 
            <td>" . ($row['role'] ?? 'NO role assigned'). "</td>
    </tr>";
}
echo "</table>";

//Left Join - joining all 3 tables but keeping all  the movies

$sql = "SELECT m.title, ma.role, a.first_name, a.last_name
        FROM movies m
        LEFT JOIN movie_actors ma ON m.movie_id = ma.movie_id
        LEFT JOIN actors a ON ma.actor_id = a.actor_id";

$result = $conn->query($sql);

echo "<h3>MOVIES AND THEIR CAST:</h3> <table border='1'>";
echo "<tr><th>Movie Title</th><th>Actor Name</th><th>Role</th></tr>";

while($row = $result->fetch_assoc()){
    $actorName = isset($row['first_name']) ? $row['first_name'] . ' ' . $row['last_name'] : 'No actor assigned';
    $role = $row['role'] ?? 'No role assigned';

    echo "<tr>
            <td>{$row['title']}</td>
            <td>{$actorName}</td>
            <td>{$role}</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>