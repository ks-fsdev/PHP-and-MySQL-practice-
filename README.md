<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP-MySQL CRUD Practice Project</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 960px;
      margin: 2rem auto;
      line-height: 1.6;
      color: #333;
    }
    h1, h2, h3 {
      color: #2c3e50;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 1rem 0;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 0.5rem;
      text-align: left;
    }
    th {
      background-color: #f5f5f5;
    }
    hr {
      border: none;
      border-top: 1px solid #bbb;
      margin: 2rem 0;
    }
    code {
      background: #eee;
      padding: 2px 5px;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <h1>📚 PHP-MySQL CRUD Practice Project</h1>

  <p>A beginner-friendly CRUD (Create, Read, Update, Delete) practice project built using PHP and MySQL. This mini-library management and student records app helps new developers understand the core functions of connecting PHP to a MySQL database and manipulating data using SQL queries.</p>

  <hr>

  <h2>🚀 Features Covered</h2>
  <ul>
    <li>✅ Database creation</li>
    <li>✅ Table creation and insertion</li>
    <li>✅ SELECT queries with conditions</li>
    <li>✅ INSERT, UPDATE, DELETE operations</li>
    <li>✅ TRUNCATE and DROP usage</li>
    <li>✅ Dynamic querying using GET forms</li>
  </ul>

  <hr>

  <h2>📁 Project Structure</h2>
  <table>
    <tr>
      <th>File Name</th>
      <th>Purpose</th>
    </tr>
    <tr>
      <td><code>create_db.php</code></td>
      <td>Creates the <strong>library</strong> database</td>
    </tr>
    <tr>
      <td><code>library.php</code></td>
      <td>Creates the <code>Books</code> table inside the library database</td>
    </tr>
    <tr>
      <td><code>insert-book.php</code></td>
      <td>Inserts a sample book record into the <code>Books</code> table</td>
    </tr>
    <tr>
      <td><code>student.php</code></td>
      <td>Creates the <code>Students</code> table and displays all records</td>
    </tr>
    <tr>
      <td><code>stdnt-query.php</code></td>
      <td>Displays filtered student data based on direct SQL queries</td>
    </tr>
    <tr>
      <td><code>stuent-filter.php</code></td>
      <td>Interactive filtering of student data using buttons + GET</td>
    </tr>
    <tr>
      <td><code>update-delete.php</code></td>
      <td>Examples of <code>UPDATE</code>, <code>DELETE</code>, <code>TRUNCATE</code>, and <code>DROP</code></td>
    </tr>
    <tr>
      <td><code>README.md</code></td>
      <td>Documentation for this project</td>
    </tr>
  </table>

  <hr>

  <h2>🛠 Requirements</h2>
  <ul>
    <li>🐘 PHP 7 or higher</li>
    <li>🗄️ MySQL Server</li>
    <li>🌐 Apache Server (XAMPP, WAMP, or MAMP)</li>
  </ul>

  <hr>

  <h2>✅ How to Use</h2>
  <ol>
    <li>Start Apache and MySQL servers from your XAMPP/WAMP/MAMP control panel.</li>
    <li>Place the project folder inside the <code>htdocs/</code> directory.</li>
    <li>Open your browser and navigate to:
      <ul>
        <li><code>localhost/php-mysql-crud/create_db.php</code> → create the database</li>
        <li><code>localhost/php-mysql-crud/library.php</code> → create <code>Books</code> table</li>
        <li><code>localhost/php-mysql-crud/insert-book.php</code> → add a book</li>
        <li><code>localhost/php-mysql-crud/student.php</code> → create student table + display records</li>
        <li><code>localhost/php-mysql-crud/stdnt-query.php</code> → run filtered queries</li>
        <li><code>localhost/php-mysql-crud/stuent-filter.php</code> → interactively filter data</li>
        <li><code>localhost/php-mysql-crud/update-delete.php</code> → update/delete entries</li>
      </ul>
    </li>
  </ol>

  <hr>

  <h2>📚 SQL Concepts Practiced</h2>
  <ul>
    <li><code>CREATE DATABASE</code>, <code>CREATE TABLE</code>, <code>INSERT INTO</code></li>
    <li><code>SELECT *</code>, <code>WHERE</code>, <code>ORDER BY</code>, <code>LIMIT</code></li>
    <li><code>UPDATE ... SET ... WHERE</code></li>
    <li><code>DELETE FROM ... WHERE</code></li>
    <li><code>TRUNCATE TABLE</code>, <code>DROP TABLE</code></li>
  </ul>

  <hr>

  <h2>🤝 Contribution</h2>
  <p>This is a personal learning project. Feel free to fork or clone it and expand with features like:</p>
  <ul>
    <li>Form-based record insertion</li>
    <li>Search/filter by input</li>
    <li>Login/authentication system</li>
  </ul>

  <hr>

  <h2>🧠 Author's Note</h2>
  <p>This project is a milestone from my self-taught journey into tech after coming from a non-CS background. Each file here is a chapter in learning how backend + databases work together. 💪💻</p>

  <hr>

  <h2>📝 License</h2>
  <p>Open-source project free to use for educational and practice purposes.</p>

</body>
</html>
