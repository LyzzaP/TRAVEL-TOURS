<?php
include 'connection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (example: check if required fields are not empty)
    if (empty($fullname) || empty($email) || empty($password)) {
        echo "Please fill in all required fields.";
        exit;
    }

    $query = "INSERT INTO registration (fullname, email, password)
              VALUES ('$fullname', '$email', '$password')";

    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: sign.html");
        exit;
    } else {
        echo "Error adding record: " . mysqli_error($db);
    }
}

mysqli_close($db);
?>