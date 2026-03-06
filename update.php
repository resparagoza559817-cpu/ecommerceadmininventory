<?php
session_start();
require 'db.php';
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if ($price >= 0 && $stock >= 0) {
        $update = $pdo->prepare("UPDATE products SET name=?, price=?, stock=? WHERE id=?");
        $update->execute([$name, $price, $stock, $id]);
        header("Location: dashboard.php");
    }
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Edit Product</h2>
    <input type="text" name="name" value="<?= $product['name'] ?>" required>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
    <input type="number" name="stock" value="<?= $product['stock'] ?>" required>
    <button type="submit">Update</button>
</form>