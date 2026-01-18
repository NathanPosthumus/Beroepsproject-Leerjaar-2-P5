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

        <?php if ($_SESSION['role'] === 'Employee'): ?>

            <button onclick="location.href='admin-dashboard.php'">Admin Dashboard</button>
            <button onclick="location.href='add_pet.php'">Add pet</button>

        <?php endif; ?>

        <button onclick="location.href='stats.php'">Stats</button>

        <?php

            if(isset($_SESSION['firstname'])) {
                echo 'Welcome, ' . $_SESSION['firstname'] . '!';
            }

        ?>
        <p>Je zit al <span id="timer">0</span> seconden op deze pagina.</p>

    <?php endif; ?>
</nav>

<script>
let seconds = 0;


  if (0 === 0) {
    interval = setInterval(() => {
      seconds++;
      document.getElementById("timer").textContent = seconds;
    }, 1000);
  }


</script>
