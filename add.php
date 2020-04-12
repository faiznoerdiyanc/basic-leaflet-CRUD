<html>
<head>
    <title>Tambah Data</title>
</head>

<body>
    <a href="index.php">Kembali</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Latitude</td>
                <td><input type="text" name="lat"></td>
            </tr>
            <tr> 
                <td>Longitude</td>
                <td><input type="text" name="long"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        // include database connection file
        include("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($connect, "INSERT INTO `positive` (`id`, `lat`, `long`) VALUES (NULL, '$lat', '$long');");

        // Show message when user added
        echo "Data Diperbaharui. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>