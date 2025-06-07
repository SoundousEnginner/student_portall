<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title) && !empty($data->description)) {
    $title = $data->title;
    $description = $data->description;

    $query = "INSERT INTO projects (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Project added successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Failed to add project"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Title and description required"]);
}

$conn->close();
?>
