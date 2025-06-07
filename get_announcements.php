<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'db_connect.php';

$display = isset($_GET['display']) ? $_GET['display'] : 'general';

$query = "SELECT * FROM announcements WHERE display = ? OR display = 'general' ORDER BY datetime DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $display);
$stmt->execute();
$result = $stmt->get_result();

$announcements = [];
while ($row = $result->fetch_assoc()) {
    $announcements[] = $row;
}

echo json_encode($announcements);
$conn->close();
?>
