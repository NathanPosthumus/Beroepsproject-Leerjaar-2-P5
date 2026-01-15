

<nav class="bg-gradient-to-r from-emerald-600 via-teal-600 to-sky-600 text-white shadow-lg flex flex-wrap items-center justify-between px-6 py-4 gap-4">
    <ul class="flex items-center gap-4 flex-wrap text-white/90 font-semibold">
        <li class="logo text-2xl font-bold tracking-tight text-white"><a href="#" class="hover:text-white transition-colors">[ Project 5 Music ]</a></li>
        <li class="text-white/90"><a href="index.php" class="hover:text-white transition-colors">Home</a></li>
        <li class="text-white/90"><a href="about.php" class="hover:text-white transition-colors">About</a></li>
        <li class="text-white/90"><a href="music.php" class="hover:text-white transition-colors">Music</a></li>
        <li class="text-white/90"><a href="search.php" class="hover:text-white transition-colors">Search</a></li>
        
        <!-- <li><a href="contact.php">Contact</a></li> -->
    </ul>

    <?php if (!isset($_SESSION['role'])): ?>
        <div class="signup_button ml-auto px-4 py-2 bg-white/15 border border-white/30 backdrop-blur text-white font-semibold rounded-md shadow hover:bg-white/25 transition" onclick="location.href='register.php'">[ Sign up ]</div>
        <div class="login_button px-4 py-2 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition" onclick="location.href='login.php'">[ Login ]</div>
    <?php else: ?>
        <div class="logout_button px-4 py-2 bg-white/15 border border-white/30 backdrop-blur text-white font-semibold rounded-md shadow hover:bg-white/25 transition" onclick="location.href='logout.php'">[ Logout ]</div>
    <?php if ($_SESSION['role'] === 'worker'): ?>
        <div class="admin-dashboard_button px-4 py-2 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition" onclick="location.href='admin-dashboard.php'">[ Admin Dashboard ]</div>
    <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['role'])): ?>
        <?php if ($_SESSION['role'] === 'worker'): ?>
        <div class="admin-dashboard_button px-4 py-2 bg-white text-emerald-700 font-semibold rounded-md shadow hover:bg-slate-100 transition" onclick="location.href='add_album.php'">[ Add album ]</div>
    <?php endif; ?>
    <?php endif; ?>
    
    
    <?php

    $logged = $_SESSION['logged'] ?? false;   
    $firstname = $_SESSION['firstname'] ?? ''; 

    if ($logged) {
    echo '<div class="admin-dashboard_button text-sm font-medium text-white/80">Welcome, ' . $firstname . '!</div>';
    }
    ?>
    <?php if (isset($_SESSION['role'])): ?>
        <div class="admin-dashboard_button px-4 py-2 bg-white/15 border border-white/30 backdrop-blur text-white font-semibold rounded-md shadow hover:bg-white/25 transition" onclick="location.href='stats.php'">[ Stats ]</div>
    <?php endif; ?>
</nav>
<!-- 
<h1 id="timer" class="admin-dashboard_button">0</h1>

 <script>
    let count = 0; //begint bij 0

    setInterval(() => { //setInterval voert de functie elke x milliseconden uit
        count++;
        document.getElementById("timer").textContent = count; //verandert de textcontent
    }, 1000);  // wacht 1 seconde
</script> --> 