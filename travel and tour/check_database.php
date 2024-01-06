<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";

// Establish database connection
$conn = mysqli_connect($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve list of databases
$sql = "SHOW DATABASES";
$result = mysqli_query($conn, $sql);

// Check if there are any databases
if (mysqli_num_rows($result) > 0) {
    echo "List of databases:<br>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Database'] . "<br>";
    }
} else {
    echo "No databases found.";
}

// Close the database connection
mysqli_close($conn);
?>