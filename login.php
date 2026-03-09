<?php
session_start();
$errors = [];


if (isset($_GET['registered'])) {
    $success = "Registration successful! Please log in.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];

    if (empty($user) || empty($email) || empty($pass)) {
        $errors[] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (strlen($pass) < 5) {
        $errors[] = "Password must be at least 5 characters.";
    } else {
        if ($user === 'admin' && $pass === 'admin') {
            $_SESSION['username'] = $user;
            setcookie("user_login", $user, time() + 3600, "/");
            header("Location: dashboard.php");
            exit();
        } else {
            $errors[] = "Invalid username or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <title>Login</title>
</head>
<body>
    <div class="main-container">
        <div class="logo-side">
            <img src="logowogo2.png" alt="Logo" class="main-logo">
        </div>
        <div class="form-side">
            <form method="POST">
                <h2>Problem Solver Surplus!</h2>
                <?php 
                    if(isset($success)) echo "<p style='color:rgb(36, 205, 56);'>$success</p>";
                    foreach($errors as $err) echo "<p style='color:red;'>$err</p>"; 
                ?>
                <input type="text" name="username" placeholder="Username" value="<?php echo $_COOKIE['user_login'] ?? ''; ?>">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login">Login</button>
                <p style="color:white; margin-top:10px;">New here? <a href="signup.php" style="color:rgb(36, 205, 56);">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
</html>