<?php
$servername = "localhost";
$username = "root";
$password = "vetal123";
$dbname = "Movies";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_name VARCHAR(200),
release_date VARCHAR(30),
format VARCHAR(50),
actors VARCHAR(200)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Movies created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>