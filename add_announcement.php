<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title) && !empty($data->content) && !empty($data->display) && !empty($data->datetime)) {
    $title = $data->title;
    $content = $data->content;
    $display = $data->display; // general, computer_science, etc.
    $datetime = $data->datetime;

    $query = "INSERT INTO announcements (title, content, display, datetime) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $title, $content, $display, $datetime);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Announcement added successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Failed to add announcement"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "All fields are required"]);
}

$conn->close();
?>
