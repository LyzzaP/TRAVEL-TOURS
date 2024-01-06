<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO dta_user_reg (full_name, email, password)
              VALUES ('$full_name', '$email', '$password')";

    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: index.html");
        exit;
    } else {
        echo "Error adding record: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>