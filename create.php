<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if ($price < 0 || $stock < 0) {
        $error = "Values cannot be negative!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $stock]);
        header("Location: dashboard.php");
    }
}
?>
<link rel="stylesheet" href="style.css">
<?php include 'navbar.php'; ?>
<h2>Add New Inventory Item</h2>

<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" placeholder="e.g. BSODA" required>
</div>

<div class="form-group">
    <label for="price">Price ($)</label>
    <input type="number" step="0.01" id="price" name="price" placeholder="0.00" required>
</div>

<div class="form-group">
    <label for="stock">Stock Quantity</label>
    <input type="number" id="stock" name="stock" placeholder="0" required>
</div>

<button type="submit">Save to Inventory</button>
