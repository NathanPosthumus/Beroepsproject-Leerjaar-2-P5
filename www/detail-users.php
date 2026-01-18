<?php
session_start();

include 'database.php';

$users_id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = $users_id";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_assoc($result);

if (!$users) {
    echo "Users not found.";
    exit;
}
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

<h1>User Details</h1>

<table border="1">
    <tr>
        <th>firstname</th>
        <td><?php echo $users['firstname']; ?></td>
    </tr>
    <tr>
        <th>lastname</th>
        <td><?php echo $users['lastname']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $users['email']; ?></td>
    </tr>
    <tr>
        <th>username</th>
        <td><?php echo $users['username']; ?></td>
    </tr>
    <tr>
        <th>password</th>
        <td><?php echo $users['password']; ?></td>
    </tr>
    <tr>
        <th>role</th>
        <td><?php echo $users['role']; ?></td>
    </tr>

</table>

</body>
</html>
