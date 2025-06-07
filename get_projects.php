<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'db_connect.php';

$query = "SELECT * FROM projects";
$result = $conn->query($query);

$projects = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
}

echo json_encode($projects);
$conn->close();
?>
