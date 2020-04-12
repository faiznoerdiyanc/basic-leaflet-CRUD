<?php
// Create database connection using config file
include "koneksi.php";

// Fetch all users data from database
$query = "select * from positive ORDER BY id DESC";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>

<html>
<head>    
    <title>Sistem Informasi Geografis Covid-19 Semarang - BASIC</title>
</head>

<header>WELCOME</header>
<header>Sistem Informasi Geografis Covid-19 Semarang</header>
<header>Basic Edition</header>
<body>
<a href="add.php">Add New User</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>Latitude</th> <th>Longitude</th> <th>Opsi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['lat']."</td>";
        echo "<td>".$user_data['long']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

    <tr><a href='maps.php'>Ke Peta</a></tr>
</body>
</html>