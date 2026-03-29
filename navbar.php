<?php

$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar">
    <div class="nav-container">
        <a href="dashboard.php" class="<?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">View Records</a>
        <a href="create.php" class="<?= ($current_page == 'create.php') ? 'active' : '' ?>">Add Record</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>