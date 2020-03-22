<?php
session_start();

include('dbconnect.php');

if ($_POST) {
    $price = $_POST['price'];

    $query = mysqli_query($connection, "update timetable set  Pricerice = {$price} where id = {$id}");

    $_SESSION['msg'] = 'Success';
    header('Location: success.php');
    exit();
}



$id = $_GET['TID'];

$query = mysqli_query($connection, "select * from timetable where TID = {$id}");

$row = mysqli_fetch_assoc($query);


?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="admindash.css" type="text/css">
</head>
<body>
<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <label for="price">Price</label><br>
    <input type="number" required name="price" id="price" value="<?php echo $row['Price'] ?>"><br><br>

    <button type="submit">Submit</button>
</form>
</body>
</html>