<?php
if (isset($_POST['price']) && isset($_GET['id'])) {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "dayo_travel_access_user_db";

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);

    $price = $_POST['price'];
    $id = $_GET['id']; // Retrieve the id from the URL parameter

    // Update the price in the reserve_booking2 table
    $query = "UPDATE reserve_booking2 SET price='$price' WHERE id='$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: adminpage2.php");
    } else {
        echo 'Failed to update price';
    }

    mysqli_close($connect);
}
?>