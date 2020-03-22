<?php
session_start();
if (!isset($_SESSION['fname'])){
    $_SESSION['msg'] = 'Please log in first';
    header('Location: login.php');
}
include('dbconnect.php');
$userid = "";
if (isset($_POST['destination'])) {
    $destination = (int)$_POST['destination'];
    $origin = (int)$_POST['origin'];
    $date = $_POST['date'];
    $userid = (int)$_SESSION['user_id'];
    $query = mysqli_query($connection, "SELECT * FROM timetable WHERE Origin = '$origin' AND Destination = '$destination'");
    $row = mysqli_fetch_assoc($query);
    $tid = (int)$row['TID'];
    $query2 = mysqli_query($connection, "insert into tickets (User, Timetable, DateTravel) VALUES ('$userid', '$tid' '$date')");

}else echo "not working";

?>
<!DOCTYPE html>
<html>
<head>
    <title>ZENdrive</title>
    <link rel="stylesheet" href="choosestyle.css" type="text/css">
</head>
<body>
<header>
    <a href="homepage.php"><img src="logo.png" alt="logo" height="50px"></a>
    <nav>
        <ul>
            <li><a href="destination.php">Destinations</a></li>
            <li><a href="#">Info</a>
                <ul>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="aboutus.html">About</a></li>
                </ul> </li>
        </ul>
    </nav>
</header>
<?php

$list = mysqli_query($connection, "select * from tickets WHERE User='$userid'");
$listresult = mysqli_fetch_assoc($list);
$timeid=(int)$listresult['Timetable'];

?>
<?php $show = mysqli_query($connection, "select * from timetable WHERE TID='$timeid'")?>
<table>
    <tr>
        <th>
            #
        </th>
        <th>
            Origin
        </th>
        <th>
            Destination
        </th>
        <th>
            Price
        </th>
        <th>
            Departure time
        </th>
    </tr>
    <?php
    while($row = mysqli_fetch_assoc($show)) { ?>
        <?php $search = mysqli_query($connection, "select Name from cities, timetable where CID = {$row['Origin']} ")?>
        <?php $search2 = mysqli_query ($connection, "select Name from cities, timetable where CID = {$row['Destination']} ")?>
        <?php $row2 = mysqli_fetch_assoc($search)?>
        <?php $row3 = mysqli_fetch_assoc($search2)?>
        <tr>
            <td>
                <?php echo $row['TID'] ?>
            </td>
            <td>
                <?php echo $row2['Name'] ?>
            </td>

            <td>
                <?php echo $row3['Name'] ?>
            </td>
            <td>
                <?php echo $row['Price'] ?>
            </td>
            <td>
                <?php echo $row['Dep_time'] ?>
            </td>

        </tr>
    <?php } ?>
</table>




<footer>
    &copy 2017-2018 - ZENdrive - All rights reserved <br>
    Design and Development - SSST students, Sarajevo 2017.
</footer>
</body>
</html>





