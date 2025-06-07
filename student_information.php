<?php
session_start(); // نبدأ الجلسة

include "backend/db.php"; // تأكد أن هذا الملف يحتوي على اتصال بقاعدة البيانات

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];       // نأخذ الإيميل من الفورم
    $password = $_POST["password"]; // نأخذ كلمة السر من الفورم

    // نبحث عن المدير في قاعدة البيانات
    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // إذا وجدنا المدير، نخزن الجلسة
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_dashboard.php"); // نحوله للوحة التحكم
        exit();
    } else {
        echo "<div style='color: red; text-align:center;'>بيانات الدخول غير صحيحة.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Panel</a>
      <a class="btn btn-outline-light" href="admin_students_list.html">Back to Student List</a>
    </div>
  </nav>

  <!-- ✅ Main Content -->
  <div class="container mt-5">
    <h2 class="mb-4">👤 Student Information</h2>

    <!-- ✅ Student Details -->
    <div class="card mb-4">
      <div class="card-body">
        <p><strong>Full Name:</strong> Sara Khellaf</p>
        <p><strong>Email:</strong> sara@example.com</p>
      </div>
    </div>

    <!-- ✅ Wishlist Section -->
    <div class="card">
      <div class="card-header">🎯 Final-Year Project Wishlist</div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">AI Chatbot for Education</li>
          <li class="list-group-item">Blockchain Voting System</li>
          <li class="list-group-item">Data Visualization Dashboard</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>© 2025 Student Portal - Admin View</p>
  </footer>

</body>
</html>
