<?php
session_start();
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    // PHP Validations
    if (empty($user) || empty($email) || empty($pass)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (strlen($pass) < 5) {
        $errors[] = "Password must be at least 5 characters.";
    } elseif ($pass !== $confirm_pass) {
        $errors[] = "Passwords do not match.";
    } else {
        header("Location: login.php?registered=true");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="main-container">
        <div class="logo-side">
            <img src="logowogo2.png" alt="Logo" class="main-logo">
        </div>
        <div class="form-side">
            <form method="POST">
                <h2>Join the Surplus!</h2>
                <?php foreach($errors as $err) echo "<p style='color:red;'>$err</p>"; ?>
                <input type="text" name="username" placeholder="Choose Username">
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Create Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <button type="submit" name="signup">Sign Up</button>
                <p style="color:white; margin-top:10px;">Already have an account? <a href="login.php" style="color:rgb(36, 205, 56);">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>