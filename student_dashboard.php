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
  <title>Student Dashboard - Student Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Student Dashboard</a>
      <a class="btn btn-outline-light" href="index.html">Logout</a>
    </div>
  </nav>

  <!-- ✅ Main Content -->
  <div class="container mt-5">
    <h2 class="mb-4">🎓 Welcome, Student!</h2>

    <!-- ✅ Wishlist Submission Form -->
    <div class="card mb-4">
      <div class="card-header">Submit Your Wishlist for Final-Year Projects</div>
      <div class="card-body">
        <form>
          <div class="mb-3">
            <label for="project1" class="form-label">Project 1</label>
            <input type="text" class="form-control" id="project1" placeholder="Enter first project of interest">
          </div>
          <div class="mb-3">
            <label for="project2" class="form-label">Project 2</label>
            <input type="text" class="form-control" id="project2" placeholder="Enter second project of interest">
          </div>
          <div class="mb-3">
            <label for="project3" class="form-label">Project 3</label>
            <input type="text" class="form-control" id="project3" placeholder="Enter third project of interest">
          </div>
          <button type="submit" class="btn btn-success">Submit Wishlist</button>
        </form>
      </div>
    </div>

    <!-- ✅ Current Wishlist Display -->
    <div class="card">
      <div class="card-header">Your Current Wishlist</div>
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
    <p>© 2025 Student Portal - Student Dashboard</p>
  </footer>

</body>
</html>
