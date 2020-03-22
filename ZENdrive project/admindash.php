<?php
session_start();
if ($_POST) {
    include('dbconnect.php');

    $name = $_POST['city'];
    $query = mysqli_query($connection, "INSERT INTO cities (Name) VALUES ('{$name}')");

    if ($query) {
        $_SESSION['msg'] = 'Success';
        header('Location: admindash.php');
        exit();
    } else {
        echo 'Fail'; ?>
        <br><a href="admindash.php">Try again</a>
        <?php
    }
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admindash.css">
</head>
<body>
<p> Hi administrator, you can go to your
    <a href="admindashedit.php">EDIT</a> dashboard. </p>
<form action="admindash.php" method="POST">
    <p> Here you can <label for="city">add another city: </label><br>
        <input type="text" required name="city" id="city"><br><br>
        <button type="submit">Submit</button>
</form>
</body>
</html>