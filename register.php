<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (!empty($user) && !empty($_POST['password'])) {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$user, $pass]);
        header("Location: login.php");
    }
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="login.php">Login here</a></p>