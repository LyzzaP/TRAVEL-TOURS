<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dayo_travel_access_user_db";

// Establish database connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve records from the table
$sql = "SELECT full_name, email, password FROM dta_user_reg";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    echo "List of records:<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Full Name: " . $row['full_name'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Password: " . $row['password'] . "<br><br>";
    }
} else {
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>