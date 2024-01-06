<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $cp_num = $_POST['cp_num'];
    $email = $_POST['email'];
    $days_and_nights = $_POST['days_and_nights'];
    $province = $_POST['province'];
    $destination = $_POST['destination)'];
    $adult_count = $_POST['adult_count'];
    $kid_count = $_POST['kid_count'];
    $vehicle = $_POST['vehicle'];
    $trav_date = $_POST['trav_date'];
    $trav_time = $_POST['trav_time'];
    $street = $_POST['street'];
    $brgy = $_POST['brgy'];
    $landmark = $_POST['landmark'];
    

    $query = "INSERT INTO reserve_booking2 (fullname, cp_num, email, days_and_nights, province, destination, adult_count, kid_count, vehicle, trav_date, trav_time, street, brgy, landmark)
              VALUES ('$fullname', '$cp_num', '$email', '$days_and_nights', '$province', '$destination', '$adult_count', '$kid_count', '$vehicle', '$trav_date', '$trav_time', '$street', '$brgy', '$landmark')";

    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: plan_2.php");
        exit;
    } else {
        echo "Error adding record: " . mysqli_error($db);
    }
}
mysqli_close($db);
?>