<?php
session_start();

include('dbconnect.php');

$query = mysqli_query($connection, "select * from timetable;");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="admindashedit.css">
</head>
<div>
<div class="klasa">
<a href="admindash.php.php">Add new city</a> <br>
<a href="logout.php">Logout</a> <br>
</div>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
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
    while($row = mysqli_fetch_assoc($query)) { ?>
        <?php $search = mysqli_query($connection, "select Name from cities where CID = {$row['Origin']} ")?>
        <?php $search2 = mysqli_query ($connection, "select Name from cities where CID = {$row['Destination']} ")?>
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
            <td>
                <a href="edit.php?TID=<?php echo $row['TID']?>">Edit</a>
                <a onclick="return confirm('Are you sure that you want to delete')" href="delete.php?TID=<?php echo $row['TID']?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>