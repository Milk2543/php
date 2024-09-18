<?php
include 'db.php';

$id = $_GET['id'] ?? 0;

if ($id) {
    $stmt = $pdo->prepare("DELETE FROM shop WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: show_data.php');
exit();
