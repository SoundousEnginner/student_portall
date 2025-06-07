<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // للسماح بالوصول من React (localhost)

$servername = "localhost";
$username = "root";  // عدل حسب إعداداتك
$password = "";      // عدل حسب إعداداتك
$dbname = "student_portal";  // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// استعلامات لجلب العدد لكل جدول
$projectsCount = 0;
$studentsCount = 0;
$announcementsCount = 0;

// جلب عدد المشاريع
$sql = "SELECT COUNT(*) as count FROM projects";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $projectsCount = intval($row['count']);
}

// جلب عدد الطلاب
$sql = "SELECT COUNT(*) as count FROM students";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $studentsCount = intval($row['count']);
}

// جلب عدد الإعلانات
$sql = "SELECT COUNT(*) as count FROM announcements";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $announcementsCount = intval($row['count']);
}

// إرجاع JSON
echo json_encode([
    "projects" => $projectsCount,
    "students" => $studentsCount,
    "announcements" => $announcementsCount
]);

$conn->close();
?>
