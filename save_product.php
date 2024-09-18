<?php
// นำเข้าไฟล์สำหรับเชื่อมต่อฐานข้อมูล
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $pdname = $_POST['pdname'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $info = $_POST['info'];

    try {
        // เตรียมคำสั่ง SQL สำหรับการ INSERT ข้อมูล
        $sql = "INSERT INTO shop (pdname, price, amonut, info) VALUES (:pdname, :price, :amount, :info)";
        
        // เตรียม statement สำหรับ PDO
        $stmt = $pdo->prepare($sql);

        // ผูกค่า parameter กับค่าจากฟอร์ม
        $stmt->bindParam(':pdname', $pdname);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':info', $info);

        // ดำเนินการ statement
        $stmt->execute();

        echo "Product added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // ปิดการเชื่อมต่อ
    $pdo = null;
}
?>
