<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'db_connect.php';

$query = "SELECT id, first_name, last_name, email FROM students";
$result = $conn->query($query);

$students = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
$conn->close();
?>
