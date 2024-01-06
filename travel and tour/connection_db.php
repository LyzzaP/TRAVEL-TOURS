<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "dayo_travel_access_user_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>