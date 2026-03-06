<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) exit("Unauthorized");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: dashboard.php");
?>
<link rel="stylesheet" href="style.css">