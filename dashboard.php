<?php
session_start();
require 'db.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>
<link rel="stylesheet" href="style.css">
<?php include 'navbar.php'; ?>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a> | <a href="create.php">Add Product</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td>$<?= $p['price'] ?></td>
        <td><?= $p['stock'] ?></td>
        <td>
            <a href="update.php?id=<?= $p['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>