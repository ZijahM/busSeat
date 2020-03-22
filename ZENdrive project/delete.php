<?php
session_start();
include 'dbconnect.php';
$id = $_GET['TID'];
mysqli_query($connection, "DELETE from timetable where TID = $id");
$_SESSION ['msg'] = 'Success';
header('Location: admindashedit.php');
exit();

?>