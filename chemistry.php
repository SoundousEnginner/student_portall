<?php
// الاتصال بقاعدة البيانات
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_portal";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// جلب إعلانات قسم الكيمياء فقط
$sql = "SELECT title, content FROM announcements WHERE department = 'chemistry' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chemistry - Student Portal</title>
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

  <!-- ✅ Header -->
  <header class="bg-danger text-white text-center py-5">
    <div class="container">
      <h1>Department of Chemistry</h1>
      <p class="lead">Chemistry Department news and announcements</p>
    </div>
  </header>

  <!-- ✅ Announcements Section -->
  <section class="container my-5">
    <h2>Department Announcements</h2>

    <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
        echo '<p class="card-text">' . htmlspecialchars($row['content']) . '</p>';
        echo '</div></div>';
      }
    } else {
      echo "<p>No announcements found for the Chemistry department.</p>";
    }
    ?>

  </section>

  <!-- ✅ Back Button -->
  <div class="container text-center mb-5">
    <a href="index.php" class="btn btn-secondary">← Back to Home</a>
  </div>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <p>© 2025 Student Portal - Chemistry</p>
  </footer>

</body>
</html>

<?php $conn->close(); ?>
