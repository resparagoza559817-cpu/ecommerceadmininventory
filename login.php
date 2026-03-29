<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        
        setcookie("last_login", date("Y-m-d H:i:s"), time() + (86400 * 30), "/");

        header("Location: dashboard.php");
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<p>Last Login: <?= isset($_COOKIE['last_login']) ? $_COOKIE['last_login'] : 'First time!' ?></p>

<p>Don't have an account? <a href="register.php">Register here</a></p>

<p style="font-size: 0.8em; color: gray;">
    Last Login: <?= isset($_COOKIE['last_login']) ? $_COOKIE['last_login'] : 'First time using this device!' ?>
</p>