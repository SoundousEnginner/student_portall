<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'db_connect.php';

$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;

if ($student_id > 0) {
    $query = "SELECT p.* FROM projects p
              JOIN student_project_wishlist w ON p.id = w.project_id
              WHERE w.student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $wishlist = [];
    while ($row = $result->fetch_assoc()) {
        $wishlist[] = $row;
    }

    echo json_encode($wishlist);
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Student ID required"]);
}

$conn->close();
?>
