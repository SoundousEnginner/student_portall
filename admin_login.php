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
  <title>Admin Login - Student Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.html">Student Portal</a>
    </div>
  </nav>

  <!-- ✅ Login Form -->
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
      <h3 class="text-center mb-4">Admin Login</h3>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" placeholder="admin@example.com" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Login</button>
      </form>
    </div>
  </div>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>© 2025 Student Portal - Admin</p>
  </footer>

</body>
</html>
