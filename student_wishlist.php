<?php
session_start();

// ❗ تأكد أن الطالب مسجّل الدخول
$student_id = $_SESSION['student_id'] ?? null;
if (!$student_id) {
  header("Location: login_student.php");
  exit();
}

// 📌 اتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "student_portal");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ✅ إضافة مشروع جديد
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['new_project'])) {
  $title = $conn->real_escape_string($_POST['new_project']);
  $sql = "INSERT INTO wishlist (student_id, title) VALUES ('$student_id', '$title')";
  $conn->query($sql);
}

// ✅ جلب مشاريع الطالب
$sql = "SELECT title FROM wishlist WHERE student_id = '$student_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Wishlist</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Student Wishlist</a>
      <a class="btn btn-outline-light" href="student_dashboard.php">Back to Dashboard</a>
    </div>
  </nav>

  <!-- ✅ Main Content -->
  <div class="container mt-5">
    <h2 class="mb-4">📝 Your Wishlist for Final-Year Projects</h2>

    <!-- ✅ Current Wishlist Display -->
    <div class="card mb-4">
      <div class="card-header">Current Wishlist</div>
      <div class="card-body">
        <ul class="list-group">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<li class="list-group-item">' . htmlspecialchars($row['title']) . '</li>';
            }
          } else {
            echo '<li class="list-group-item text-muted">No projects yet in your wishlist.</li>';
          }
          ?>
        </ul>
      </div>
    </div>

    <!-- ✅ Project Submission Form -->
    <div class="card">
      <div class="card-header">Submit New Project to Wishlist</div>
      <div class="card-body">
        <form method="POST">
          <div class="mb-3">
            <label for="new_project" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="new_project" name="new_project" required placeholder="Enter project title">
          </div>
          <button type="submit" class="btn btn-success">Add Project</button>
        </form>
      </div>
    </div>
  </div>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>© 2025 Student Portal - Your Wishlist</p>
  </footer>

</body>
</html>

<?php $conn->close(); ?>
