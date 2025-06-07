<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// قراءة البيانات JSON القادمة من React
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

$email = $data['email'] ?? '';
$password = $data['password'] ?? '';

if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    exit;
}

// اتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "student_portal_project");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// تأكد من المستخدم
$stmt = $conn->prepare("SELECT id, email, password_hash FROM students WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé']);
    exit;
}

$user = $result->fetch_assoc();

// تحقق من كلمة السر (تأكد من أن تستخدم hash صحيح في قاعدة البيانات)
if (password_verify($password, $user['password_hash'])) {
    echo json_encode(['success' => true, 'message' => 'Connexion réussie', 'user_id' => $user['id']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Mot de passe incorrect']);
}

$stmt->close();
$conn->close();
?>
