<?php
include 'connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fullname = $_POST["fullname"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($fullname) || empty($new_password) || empty($confirm_password)) {
        echo "Please fill in all fields.";
    } else if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        
        $user_id = $_SESSION["user_id"]; 
        $sql = "UPDATE users SET fullname = '$fullname', password = '$new_password' WHERE id = '$user_id'";
       

        header("Location: updated.html");
        exit();
    }
}