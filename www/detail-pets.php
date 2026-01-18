<?php
session_start();

include 'database.php';

$pets_id = $_GET['id'];

$sql = "SELECT * FROM pets WHERE id = $pets_id";
$result = mysqli_query($conn, $sql);
$pets = mysqli_fetch_assoc($result);

if (!$pets) {
    echo "Pets not found.";
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

<h1>Pet Details</h1>

<table border="1">
    <tr>
        <th>Name</th>
        <td><?php echo $pets['name']; ?></td>
    </tr>
    <tr>
        <th>Species</th>
        <td><?php echo $pets['species']; ?></td>
    </tr>
    <tr>
        <th>Breed</th>
        <td><?php echo $pets['breed']; ?></td>
    </tr>
    <tr>
        <th>Age</th>
        <td><?php echo $pets['age']; ?></td>
    </tr>
    <tr>
        <th>Gender</th>
        <td><?php echo $pets['gender']; ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $pets['description']; ?></td>
    </tr>
    <tr>
        <th>Size</th>
        <td><?php echo $pets['size']; ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo $pets['status']; ?></td>
    </tr>

    <tr>
        <th>Image</th>
        <td><img src="images/<?= $pets['image'] ?>" alt="<?= $pets['name'] ?>"></td>
    </tr>
    <tr>
        <th>Added At</th>
        <td><?php echo $pets['added_at']; ?></td>
    </tr>
</table>

</body>
</html>
