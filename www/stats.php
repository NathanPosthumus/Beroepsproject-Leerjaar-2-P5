<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("location: login.php");
    exit;
}

include 'database.php';

$result = mysqli_query($conn, "SELECT * FROM pets");
$pets = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$userss = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project 7 - Pets - De Vrolijke Viervoeter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'nav.php'; ?>

<h1>Statistics Page</h1>
<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

<h2>Persoonlijke Statistics:</h2>
<ul>
    <li>First Name: <?php echo $userss['firstname']; ?></li>
    <li>Last Name: <?php echo $userss['lastname']; ?></li>
    <li>Email: <?php echo $userss['email']; ?></li>
    <li>Username: <?php echo $userss['username']; ?></li>
    <li>Password: <?php echo $userss['password']; ?></li>
</ul>

<h2>Pets Statistics:</h2>
<ul>
    <li>Aantal pets: <?php echo count($pets); ?></li>
    <li>Aantal users: <?php echo 1; ?></li>
</ul>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Employee'): ?>
    <h2>Admin Statistics:</h2>

    
        
        <?php foreach ($pets as $pet): ?>
            <table border="1">
            <tr>
            <th>Name</th>
            <th>Species</th>
            <th>Breed</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Description</th>
            <th>Size</th>
            <th>Status</th>
            <th>Image</th>
            <th>Added At</th>
        </tr>
        
            <tr>
                <td><?php echo $pet['name']; ?></td>
                <td><?php echo $pet['species']; ?></td>
                <td><?php echo $pet['breed']; ?></td>
                <td><?php echo $pet['age']; ?></td>
                <td><?php echo $pet['gender']; ?></td>
                <td><?php echo $pet['description']; ?></td>
                <td><?php echo $pet['size']; ?></td>
                <td><?php echo $pet['status']; ?></td>
                <td><img src="images/<?php echo $pet['image']; ?>" alt=""></td>
                <td><?php echo $pet['added_at']; ?></td>
            </tr>
            </table>
        <?php endforeach; ?>




        <h1>Users Statistics:</h1>

        <form action="search_process_users.php" method="GET">
    <label for="zoekterm">Zoek op naam</label>
    <input type="text" name="zoekterm" id="zoekterm" placeholder="Zoek op naam">
    <button type="submit">Zoek!</button>
</form>

        <?php foreach ($users as $user): ?>
            <table border="1">
            <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>role</th>

        </tr>
        
            <tr>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['role']; ?></td>
            </tr>
            </table>
        <?php endforeach; ?>
    
<?php endif; ?>

</body>
</html>
