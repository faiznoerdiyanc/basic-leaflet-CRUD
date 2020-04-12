<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $lat=$_POST['lat'];
    $long=$_POST['long'];

    // update user data
    $result = mysqli_query($connect, "UPDATE positive SET lat='$lat',long='$long' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($connect, "SELECT * FROM positive WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $lat = $user_data['lat'];
    $long = $user_data['long'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form lat="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>lat</td>
                <td><input type="text" lat="lat" value=<?php echo $lat;?>></td>
            </tr>
            <tr> 
                <td>long</td>
                <td><input type="text" lat="long" value=<?php echo $long;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" lat="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" lat="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>