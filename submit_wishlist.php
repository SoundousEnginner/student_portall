<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->student_id) && !empty($data->projects) && is_array($data->projects)) {
    $student_id = $data->student_id;
    $projects = $data->projects;

    // حذف القديم
    $deleteQuery = "DELETE FROM student_project_wishlist WHERE student_id = ?";
    $stmtDelete = $conn->prepare($deleteQuery);
    $stmtDelete->bind_param("i", $student_id);
    $stmtDelete->execute();

    // إدخال الجديد
    $insertQuery = "INSERT INTO student_project_wishlist (student_id, project_id) VALUES (?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);

    foreach ($projects as $project_id) {
        $stmtInsert->bind_param("ii", $student_id, $project_id);
        $stmtInsert->execute();
    }

    echo json_encode(["success" => true, "message" => "Wishlist updated successfully"]);
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Invalid input"]);
}

$conn->close();
?>

