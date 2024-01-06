<?php
$con=mysqli_connect('localhost','root','','dayo_travel_access_user_db');  
$sql=mysqli_query($con,"select * from reserve_booking2");  
$row=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <header>
        <a href="packages.html"> <img src="IMAGES/DAYO LOGO.png"  alt="Dayo Logo"></a>
       </header>
</head>
<body>
    <form action="index.html">

        <h2>YOU HAVE SUCCESSFULLY BOOKED!!!</h2>

        <div>
        <!--Details of Package-->
        <p><b><em>Name: </em></b><?php echo $row['fullname'] ?> </p>
    <p><b><em>Email: </em></b> <?php echo $row["email"]; ?></p>
    <p><b><em>CP#: </em></b> <?php echo $row["cp_num"]; ?></p>
    <p><b><em>Days and Nights: </em></b> <?php echo $row["days_and_nights"]; ?></p>
    <p><b><em>Province: </em></b><?php echo $row["province"]; ?></p>
    <p><b><em>Destination: </em></b><?php echo $row["destination"]; ?></p>
    <p><b><em>Adult Count: </em></b><?php echo $row["adult_count"]; ?></p>
    <p><b><em>Kids Count: </em></b><?php echo $row["kid_count"]; ?></p>
    <p><b><em>Vehicle: </em></b><?php echo $row["vehicle"]; ?></p>
    <p><b><em>Travel Date: </em></b><?php echo $row["trav_date"]; ?></p>
    <p><b><em>Travel Time: </em></b><?php echo $row["trav_time"]; ?></p>
    <p><b><em>Pick-Up Location: </em></b><?php echo $row["street"]; ?>, <?php echo $row["brgy"]; ?></p>
        </div>

        <button type="submit" class="reservation">Thank You</button>

    </form>


</body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-image: linear-gradient(rgba(74, 113, 165, 0.179),rgba(19, 96, 100, 0.201)),url(IMAGES/WALLPAPER.png);
      height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #333;
    }

    header {
        text-align: center;
    }

    header img {
        max-width: 50%;
        height: auto;
        cursor: pointer;
    }

    button {
      background-color: #19ac14;
      color: #fff;
      padding: 20px 100px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
     

    }

    button:hover {
        background-color: #18866a;
        text-align: center;
    }

   h2{
    text-align: center;
    color: #ffffff;
    font-size: 40px;
   }

   form{
    
    padding: 20px 50px 20px 50px;
   }

   form{
  color: white;
  background-color: #18866acc;
  padding: 40px 50px 40px 50px;
  border-radius: 8px;
}
  
</style>
</html>
