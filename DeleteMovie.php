<?php
$conn = mysqli_connect("localhost", "root", "vetal123", "Movies");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$delete = $_REQUEST['delete'];
$sql = "DELETE FROM Movies WHERE id=$delete";
print_r($sql);
$result = mysqli_query($conn, $sql);