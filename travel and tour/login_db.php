<?php
// Database configuration
include "connection.php";
$host = "localhost";
$username = "root";
$password = "";
$database = "dayo_travel_access_user_db";

// Establish database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve login form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement
$sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";

// Execute the query
$result = mysqli_query($conn, $sql);
 
// Check if any rows matched the login credentials
if (mysqli_num_rows($result) > 0) {
    // Login successful
    header("Location: index.html");
} else{
    echo "<div class='alert alert-danger'>Password does not match</div>";
}

// Close the database connection
mysqli_close($conn);
?>