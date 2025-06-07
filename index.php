<?php
session_start(); 

include "backend/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];       
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
  <title>Student Portal - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Student Portal</a>
    </div>
  </nav>

  <!-- ✅ Header -->
  <header class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1>Welcome to the Student Portal</h1>
      <p class="lead">Check the latest announcements and department updates</p>
    </div>
  </header>

  <!-- ✅ Announcements Section -->
  <section class="container my-5">
    <h2> General Announcements</h2>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">📅 New Semester Starts March 25</h5>
        <p class="card-text">All students should check their department pages for project info.</p>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">🔔 Final-Year Projects List Published</h5>
        <p class="card-text">Submit your wishlist before the deadline!</p>
      </div>
    </div>
  </section>

  <!-- ✅ Department Links -->
  <section class="container my-5">
    <h2> Departments</h2>
    <div class="row">
      <div class="col-md-3 col-sm-6 mb-2">
        <a href="computer_science.html" class="btn btn-outline-primary w-100">Computer Science</a>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <a href="math.html" class="btn btn-outline-primary w-100">Mathematics</a>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <a href="physics.html" class="btn btn-outline-primary w-100">Physics</a>
      </div>
      <div class="col-md-3 col-sm-6 mb-2">
        <a href="chemistry.html" class="btn btn-outline-primary w-100">Chemistry</a>
      </div>
    </div>
  </section>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>© 2025 Student Portal. All rights reserved.</p>
  </footer>

</body>
</html>
