

<nav>
    <ul>
        <li class="logo"><a href="#">[ Project 5 Music ]</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="music.php">Music</a></li>
        <!-- <li><a href="contact.php">Contact</a></li> -->
    </ul>

    <?php if (!isset($_SESSION['role'])): ?>
        <div class="signup_button" onclick="location.href='register.php'">[ Sign up ]</div>
        <div class="login_button" onclick="location.href='login.php'">[ Login ]</div>
    <?php else: ?>
        <div class="logout_button" onclick="location.href='logout.php'">[ Logout ]</div>
    <?php if ($_SESSION['role'] === 'worker'): ?>
        <div class="admin-dashboard_button" onclick="location.href='admin-dashboard.php'">[ Admin Dashboard ]</div>
    <?php endif; ?>
    <?php endif; ?>
    <?php

    $logged = $_SESSION['logged'] ?? false;   
    $firstname = $_SESSION['firstname'] ?? ''; 

    if ($logged) {
    echo '<div class="admin-dashboard_button">Welcome, ' . $firstname . '!</div>';
    }
    ?>
</nav>