<nav>
    <ul>

        <li><a href="index.php">[ De Vrolijke Viervoeter ]</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="pets.php">Pets</a></li>
        <li><a href="search.php">Search</a></li>

    </ul>

    <?php if (!isset($_SESSION['role'])): ?>

        <button onclick="location.href='register.php'">Sign up</button>
        <button onclick="location.href='login.php'">Login</button>

    <?php else: ?>

        <button onclick="location.href='logout.php'">Logout</button>

        <?php if ($_SESSION['role'] === 'worker'): ?>

            <button onclick="location.href='admin-dashboard.php'">Admin Dashboard</button>
            <button onclick="location.href='add_album.php'">Add album</button>

        <?php endif; ?>

        <button onclick="location.href='stats.php'">Stats</button>

        <?php

            if(isset($_SESSION['firstname'])) {
                echo 'Welcome, ' . $_SESSION['firstname'] . '!';
            }

        ?>

    <?php endif; ?>
</nav>
