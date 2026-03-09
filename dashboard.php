<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$usd_to_php = 57; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design.css">
    <title>Problem Solver Dashboard</title>
</head>
<body class="dashboard-body">
    <audio id="bgMusic" autoplay loop><source src="webmusic.mp3" type="audio/mpeg"></audio>

    <div class="shop-wrapper">
        
        <div class="main-container shop-container">
            <div class="scrollable-content">
                
                <div class="shop-item">
                    <img src="frame_00000.png" class="item-icon">
                    <div class="item-details">
                        <h3>Bsoda</h3>
                        <p>$0.25 / ₱<?php echo 0.25 * $usd_to_php; ?></p>
                        <a href="#" class="info-link">Click here for more info!</a>
                        <div class="controls">
                            <img src="frame_00003.png" class="btn-action btn-outline" alt="Add">
                            <img src="frame_00004.png" class="btn-action btn-outline" alt="Remove">
                            <span class="status-text">In Cart: 0</span>
                            <span class="status-text">In Stock: 99</span>
                        </div>
                    </div>
                </div>

                <div class="shop-item">
                    <img src="frame_00001.png" class="item-icon">
                    <div class="item-details">
                        <h3>Dirty Chalk Eraser</h3>
                        <p>$1.00 / ₱<?php echo 1.00 * $usd_to_php; ?></p>
                        <a href="#" class="info-link">Click here for more info!</a>
                        <div class="controls">
                            <img src="frame_00003.png" class="btn-action btn-outline" alt="Add">
                            <img src="frame_00004.png" class="btn-action btn-outline" alt="Remove">
                            <span class="status-text">In Cart: 0</span>
                            <span class="status-text">In Stock: 99</span>
                        </div>
                    </div>
                </div>

                <div class="shop-item">
                    <img src="frame_00002.png" class="item-icon">
                    <div class="item-details">
                        <h3>Safety Scissors</h3>
                        <p>$0.50 / ₱<?php echo 0.50 * $usd_to_php; ?></p>
                        <a href="#" class="info-link">Click here for more info!</a>
                        <div class="controls">
                            <img src="frame_00003.png" class="btn-action btn-outline" alt="Add">
                            <img src="frame_00004.png" class="btn-action btn-outline" alt="Remove">
                            <span class="status-text">In Cart: 0</span>
                            <span class="status-text">In Stock: 99</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sidebar">
            <div class="nav-group">
                <img src="frame_00005.png" alt="View Cart">
                <p>View Cart</p>
            </div>
            <div class="nav-group">
                <img src="frame_00006.png" alt="Checkout">
                <p>Checkout</p>
            </div>
            
            <div class="volume-container">
                <label>Volume</label>
                <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.5">
            </div>

            <form method="POST">
                <button type="submit" name="logout" id="logoutBtn">Log Out!</button>
            </form>
        </div>
    </div>

    <script>
    const audio = document.getElementById('bgMusic');
    const slider = document.getElementById('volumeSlider');

    // 1. Set volume immediately
    audio.volume = slider.value;

    // 2. Function to start the music
    const startMusic = () => {
        if (audio.paused) {
            audio.play().then(() => {
                console.log("Music started successfully!");
            }).catch(error => {
                console.log("Waiting for user interaction...");
            });
        }
    };

    // 3. Try to play as soon as the page loads
    window.addEventListener('load', startMusic);

    // 4. THE FIX: If load is blocked, play on the very first click anywhere on the page
    document.addEventListener('click', startMusic, { once: true });

    // 5. Update volume when slider moves
    slider.addEventListener('input', () => {
        audio.volume = slider.value;
    });
</script>
</body>
</html>