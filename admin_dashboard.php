<?php
session_start();
include "backend/db.php";

// ✅ التحقق من البيانات عند الضغط على زر الدخول
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "البريد الإلكتروني أو كلمة السر غير صحيحة.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>دخول المدير - بوابة الطالب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Student Portal</a>
  </div>
</nav>

<!-- ✅ Login Form -->
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
    <h3 class="text-center mb-4">دخول المدير</h3>

    <!-- ✅ رسالة خطأ إن وُجدت -->
    <?php if(isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="admin@example.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">كلمة السر</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
      </div>
      <button type="submit" class="btn btn-success w-100">دخول</button>
    </form>
  </div>
</div>

<!-- ✅ Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p>© 2025 Student Portal - Admin</p>
</footer>

</body>
</html>
