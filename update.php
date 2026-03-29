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
<?php include 'navbar.php'; ?>
<form method="POST">
    <h2>Edit Product</h2>
    
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>

    <div class="form-group">
        <label for="price">Price ($)</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= $product['price'] ?>" required>
    </div>

    <div class="form-group">
        <label for="stock">Stock Quantity</label>
        <input type="number" id="stock" name="stock" value="<?= $product['stock'] ?>" required>
    </div>

    <button type="submit">Update Item</button>
</nav>