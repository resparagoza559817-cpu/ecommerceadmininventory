<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>
<link rel="stylesheet" href="style.css">