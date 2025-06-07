<?php
$host = 'localhost';
$db   = 'student_portal';
$user = 'root';
$pass = ''; // اتركها فارغة إذا كنت تعمل بـ XAMPP ولم تغير كلمة السر
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    exit();
}
?>
