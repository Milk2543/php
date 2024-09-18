<?php
$host = "localhost";  // ที่อยู่เซิร์ฟเวอร์ MySQL (ปกติจะเป็น localhost)
$dbname = "db_654230012";  // ชื่อฐานข้อมูลของคุณ
$user = "root";  // ชื่อผู้ใช้ MySQL ของคุณ
$pass = "";  // รหัสผ่าน MySQL ของคุณ

try {
    // สร้างการเชื่อมต่อ PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // ตั้งค่า PDO ให้แสดงข้อผิดพลาดเมื่อมีปัญหา
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
