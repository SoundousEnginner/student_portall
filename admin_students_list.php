<?php
// الاتصال بقاعدة البيانات (تبدل القيم حسب البيئة ديالك)
$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_portal";

$conn = new mysqli($host, $user, $password, $dbname);

// فحص الاتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب الطلبة
$sql = "SELECT id, full_name, email FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student List - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

  <!-- ✅ Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Panel</a>
      <a class="btn btn-outline-light" href="admin_dashboard.php">Back to Dashboard</a>
    </div>
  </nav>

  <!-- ✅ Main Content -->
  <div class="container mt-5">
    <h2 class="mb-4">📋 List of Students</h2>

    <!-- ✅ Students Table -->
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>View Details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          $i = 1;
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td><a href='student_information.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>View</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4' class='text-center'>No students found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- ✅ Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>© 2025 Student Portal - Admin</p>
  </footer>

</body>
</html>

<?php
$conn->close();
?>
